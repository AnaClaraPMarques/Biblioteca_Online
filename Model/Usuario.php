  <?php
  
  //ATUALIZAR COM AS INFORMAÇÕES DO BDD!!!!!
  class UsuarioController
{

//Terminar essa função
public function listar(){}

//Terminar essa função
public function cadastrar(){}

  
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