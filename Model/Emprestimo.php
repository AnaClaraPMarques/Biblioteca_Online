  <?php
  
  class Emprestimo
{

private \PDO $connection;
 
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }


  public function realizar(int $id_emprestimo, int $isbn, int $id_usuario,int $data_emprestimo,int $data_devolucao) {
    $sql = "INSERT INTO emprestimo (id_emprestimo, isbn, id_usuario, data_emprestimo, data_devolucao)
            VALUES (:id_emprestimo, :isbn, :id_usuario, :data_emprestimo, :data_devolucao)";

    $stmt = $this->connection->prepare($sql);

    $stmt->execute([
        ':id_emprestimo' => $id_emprestimo,
        ':isbn' => $isbn,
        ':id_usuario' => $id_usuario,
        ':data_emprestimo' => $data_emprestimo,
        ':data_devolucao' => $data_devolucao
    ]);

    public function listar () : array{

    $stmt = $this->connection->query("SELECT * FROM emprestimos");
 
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}

public function devolver(int $id_emprestimo, int $isbn, int $id_usuario,int $data_emprestimo,int $data_devolucao){

   $sql = "UPDATE emprestimo
                SET data_devolucao = :data_devolucao
                WHERE id_emprestimo = :id_emprestimo
                  AND isbn = :isbn
                  AND id_usuario = :id_usuario
                  AND data_emprestimo = :data_emprestimo";
 
        $stmt = $this->connection->prepare($sql);
 
        return $stmt->execute([
            ':id_emprestimo' => $id_emprestimo,
            ':isbn' => $isbn,
            ':id_usuario' => $id_usuario,
            ':data_emprestimo' => $data_emprestimo,
            ':data_devolucao' => $data_devolucao
        ]);
    }

}

public function renovar (int $id_usuario, int $data_emprestimo, int $data_devolucao): array{
   $sql = "UPDATE emprestimos
          SET data_emprestimo = :data_emprestimo,
          WHERE id_emprestimo = :id_emprestimo,
          AND id_usuario = :id_usuario";

           $stmt = $this->connection->prepare($sql);

    return $stmt->execute([
        ':id_emprestimo' => $id_emprestimo,
        ':id_usuario' => $id_usuario,
        ':data_devolucao' => $data_devolucao
    ]);

}

public function listarAtrasados(): array
{
    $sql = "SELECT * FROM emprestimo
            WHERE data_devolucao < CURDATE()
              AND devolvido = 0";

    $stmt = $this->connection->query($sql);

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}


