<?php


namespace Controller;


use Model\Livro;


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
        $livro->cadastrar($_POST['isbn'], $_POST['titulo'], $_POST['autor'], $_POST['genero'], $_POST['ano']);
        return $livro;

    }

    public function editar()
    {
        $livro = new Livro($this->connection);
        $livro->editar($_POST['isbn'], $_POST['titulo'], $_POST['autor'], $_POST['genero'], $_POST['ano']);
        return $livro;
    }

    public function excluir()
    {
        $livro = new Livro($this->connection);
        $livro->excluir($_POST['isbn']);
        return $livro;
    }

    
    public function buscar()
    {
        $livro = new Livro($this->connection);

       if (isset($_POST['titulo']) && isset($_POST['autor'])) {
        return $livro->buscar( $_POST['titulo'], $_POST['autor'] ); 
        }

        if (isset($_POST['palavra'])) { 
         return $livro->buscar($_POST['palavra']); 
         }    
       return [];

        
    }
}
?>