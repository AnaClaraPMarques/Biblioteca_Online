  <?php
  
  class Usuario
{

 private \PDO $connection;
 
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

 public function cadastrar(string $nome, string $email, string $senhaHash): bool
    {
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
 
        $stmt = $this->connection->prepare($sql);
 
        return $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senhaHash
        ]);
    }

     public function buscarPorEmail(string $email): array|false
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
 
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':email' => $email]);
 
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
 
    public function listarTodos(): array
    {
        $stmt = $this->connection->query("SELECT id, nome, email FROM usuarios");
 
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
  
public function editar( int $id, string $nome, string $email ): bool { 

$sql = "UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id"; 

$stmt = $this->pdo->prepare($sql); 

return $stmt->execute([ ':id' => $id, ':nome' => $nome, ':email' => $email ]); 
}


public function excluir(int $id): bool
{
    $sql = "DELETE FROM usuarios
            WHERE id = :id";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        ':id' => $id
    ]);
}

}