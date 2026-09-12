<?php

namespace Model;

class Emprestimo
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

  
    public function realizar(
        string $isbn,
        int $id_usuario,
        string $data_emprestimo,
        string $data_devolucao
    ): bool {

        $sql = "INSERT INTO emprestimos
                (id_usuario_fk, isbn_fk, data_emprestimo, data_devolucao)
                VALUES
                (:id_usuario_fk, :isbn_fk, :data_emprestimo, :data_devolucao)";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([
            ':id_usuario_fk' => $id_usuario,
            ':isbn_fk' => $isbn,
            ':data_emprestimo' => $data_emprestimo,
            ':data_devolucao' => $data_devolucao
        ]);
    }

    
    public function listarPorUsuario(int $id_usuario): array
{
    $sql = "SELECT
                e.id_emprestimo,
                e.isbn_fk,
                e.data_emprestimo,
                e.data_devolucao,
                l.titulo
            FROM emprestimos e
            INNER JOIN livros l
                ON e.isbn_fk = l.isbn
            WHERE e.id_usuario_fk = :id_usuario
            ORDER BY e.data_emprestimo DESC";

    $stmt = $this->connection->prepare($sql);

    $stmt->execute([
        ':id_usuario' => $id_usuario
    ]);

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

   
    public function devolver(int $id_emprestimo): bool
    {
        $sql = "DELETE FROM emprestimos
                WHERE id_emprestimo = :id_emprestimo";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([
            ':id_emprestimo' => $id_emprestimo
        ]);
    }

 
   public function renovar(
    int $id_emprestimo,
    string $nova_data_devolucao
): bool {

    $sql = "UPDATE emprestimos
            SET data_devolucao = :data_devolucao
            WHERE id_emprestimo = :id_emprestimo";

    $stmt = $this->connection->prepare($sql);

    return $stmt->execute([
        ':data_devolucao' => $nova_data_devolucao,
        ':id_emprestimo' => $id_emprestimo
    ]);
}

  
    public function listarAtrasados(): array
    {
        $sql = "SELECT *
            FROM emprestimos
            WHERE data_devolucao < CURDATE()";

    $stmt = $this->connection->query($sql);

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}


}