<?php


namespace Controller;


use Model\Livro;

//CORRIGIR FUNÇÕES DE CADASTRAR, EDITAR E EXCLUIR PARA RECEBER OS DADOS DO FORMULÁRIO E CHAMAR O MÉTODO CORRESPONDENTE DO MODELO
class LivroController
{
    private \PDO $connection; 
    public function __construct(\PDO $connection) { 
        $this->connection = $connection; 
        }
    public function listar()
    {
        $livro = new Livro($this->connection);
        $listaLivros = $livro->listarTodos();

        return $listaLivros;
    }

    public function cadastrar()
    {
        $livro = new Livro($this->connection);
        $livro->cadastrar($_POST['titulo'], $_POST['autor'], $_POST['isbn'], $_POST['genero'], $_POST['ano']);
        return $livro;

    }

    public function editar()
    {
        $livro = new Livro($this->connection);
        $livro->editar($_POST['isbn'], $_POST['titulo'], $_POST['autor'], $_POST['isbn']);
        return $livro;
    }

    public function excluir()
    {
        $livro = new Livro($this->connection);
        $livro->excluir($_POST['isbn']);
        return $livro;
    }

    

//VER ESSE ERRO AQUI
    public function buscar()
    {
        $livro = new Livro($this->connection);

       if (isset($_POST['titulo']) && isset($_POST['autor'])) {
        return $livro->buscar( $_POST['titulo'], $_POST['autor'] ); 
        }

        //Claraa, esse é um if alternativo para alteração 
        //depois da criação da pasta buscarLivro da View
        //porque com esse ´palavra´ele vai buscar não só o título ou isbn
        //Vai buscar por 
        //qualquer referÊncia da pesquisa que tenha a ver com o livro:

        //
         // if (isset($_POST['palavra'])) { 
         // return $livro->buscar($_POST['palavra']); 
         // }    
         // return [];
         // }
        
    }
}
?>