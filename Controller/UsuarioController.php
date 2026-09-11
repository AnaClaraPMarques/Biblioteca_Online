<?php

namespace Controller;

use Model\Usuario;


class UsuarioController 
{
    private $usuarioModel;

<<<<<<< HEAD
   private Usuario $usuarioModel;
 
    public function __construct(\PDO $connection)
    {
        $this->usuarioModel = new Usuario($connection);
    }

 

    private function validateEmptyFields(string $nome, string $email, string $senha):bool
    {
         if(empty($nome) or empty($email) or empty($senha)){
=======
    public function __construct()
    {
        $this->usuarioModel = new User();
    }

    //TIRAR DUVIDA COM A PROFESSORA SOBRE ESSA FUNÇÃO, SE É NECESSÁRIO OU NÃO
    private function validateEmptyFields(string $nome, string $email, string $senha): bool
    {
        if (empty($nome) || empty($email) || empty($senha)) {
>>>>>>> d4fca129daad68f187ff91b0f487bc2d4d753e54
            return false;
        }

        return true;
    }

    public function listar() 
    {   
        $usuarios = $this->usuarioModel->listarTodos(); 
        require_once '../views/usuarios/listar.php'; 
    } 
    
    public function cadastrar() 
    { 
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') { 
            return; 
        } 
        
        $nome = $_POST['nome'] ?? ''; 
        $email = $_POST['email'] ?? ''; 
        $senha = $_POST['senha'] ?? ''; 
        
        if (!$this->validateEmptyFields($nome, $email, $senha)) { 
            echo "Preencha todos os campos."; 
            return; 
        } 
            
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "E-mail inválido."; 
            return; 
        } 
             
        $senha = password_hash($senha, PASSWORD_DEFAULT); 
             
        $this->usuarioModel->cadastrar($nome, $email, $senha); 
             
        echo "Usuário cadastrado com sucesso!"; 
    } 

    public function editar()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') { 
            return; 
        }

        $id = $_POST['id'] ?? null; 
        $nome = $_POST['nome'] ?? ''; 
        $email = $_POST['email'] ?? '';

        if (!$id) { 
            echo "Usuário não encontrado."; 
            return; 
        }

        if (trim($nome) === '' || trim($email) === '') { 
            echo "Preencha todos os campos."; 
            return; 
        } 
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
            echo "E-mail inválido."; 
            return; 
        } 
        
        $resultado = $this->usuarioModel->editar($id, $nome, $email); 
        
        if ($resultado) { 
            echo "Usuário atualizado com sucesso!"; 
        } else { 
            echo "Erro ao atualizar usuário."; 
        } 
    }

    public function excluir()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        $id = $_POST['id'] ?? null;

        if (!$id) {
            echo "Usuário não encontrado.";
            return;
        }

        $resultado = $this->usuarioModel->excluir($id);

        if ($resultado) {
            echo "Usuário excluído com sucesso!";
        } else {
            echo "Erro ao excluir usuário.";
        }
    }
<<<<<<< HEAD

    $id = $_POST['id'] ?? null;

    if (!$id) {
        echo "Usuário não encontrado.";
        return;
    }

    $resultado = $this->usuarioModel->excluir($id);

    if ($resultado) {
        echo "Usuário excluído com sucesso!";
    } else {
        echo "Erro ao excluir usuário.";
    }

      public function listar(): void


 $usuarios = $this->usuarioModel->listarTodos();


}

    
=======
}
>>>>>>> d4fca129daad68f187ff91b0f487bc2d4d753e54
