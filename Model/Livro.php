  <?php
  
   namespace Model;
  class Livro
{

private \PDO $connection;
 
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

        public function listarTodos(): array
    {
        $stmt = $this->connection->query("SELECT * FROM livro");
 
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
 
    public function buscarPorIsbn(string $isbn): array|false
    {
        $sql = "SELECT * FROM livro WHERE isbn = :isbn";
 
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':isbn' => $isbn]);
 
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
 
    public function cadastrar(string $isbn, string $titulo, string $autor, string $genero, int $ano): bool
    {
        $sql = "INSERT INTO livro (isbn, titulo, autor, genero, ano)
                VALUES (:isbn, :titulo, :autor, :genero, :ano)";
 
        $stmt = $this->connection->prepare($sql);
 
        return $stmt->execute([
            ':isbn' => $isbn,
            ':titulo' => $titulo,
            ':autor' => $autor,
            ':genero' => $genero,
            ':ano' => $ano
        ]);
    }
 
    public function editar(string $isbn, string $titulo, string $autor, string $genero, int $ano): bool
    {
        $sql = "UPDATE livro
                SET titulo = :titulo, autor = :autor, genero = :genero, ano = :ano
                WHERE isbn = :isbn";
 
        $stmt = $this->connection->prepare($sql);
 
        return $stmt->execute([
            ':isbn' => $isbn,
            ':titulo' => $titulo,
            ':autor' => $autor,
            ':genero' => $genero,
            ':ano' => $ano
        ]);
    }
 
    public function excluir(string $isbn): bool
    {
        $sql = "DELETE FROM livro WHERE isbn = :isbn";
 
        $stmt = $this->connection->prepare($sql);
 
        return $stmt->execute([':isbn' => $isbn]);
    }
 
    public function buscar(string $palavra): array
    {
        $sql = "SELECT * FROM livro
                WHERE titulo LIKE :palavra OR autor LIKE :palavra";
 
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':palavra' => "%{$palavra}%"]);
 
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}


