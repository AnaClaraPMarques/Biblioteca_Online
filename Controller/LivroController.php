<?php


namespace Controller;


use Model\Livro;

//CORRIGIR FUNÇÕES DE CADASTRAR, EDITAR E EXCLUIR PARA RECEBER OS DADOS DO FORMULÁRIO E CHAMAR O MÉTODO CORRESPONDENTE DO MODELO
class LivroController
{
    public function listar()
    {
        $livro = new Livro();
        $listaLivros = $livro->listarTodos();

        return $listaLivros;
    }

    public function cadastrar()
    {
        $livro = new Livro();
        $livro->cadastrar($_POST['titulo'], $_POST['autor'], $_POST['isbn']);
        $livro->save();
        return $livro;

    }

    public function editar()
    {
        $livro = new Livro();
        $livro->editar($_POST['id'], $_POST['titulo'], $_POST['autor'], $_POST['isbn']);
        $livro->save();
        return $livro;
    }

    public function excluir()
    {
        $livro = new Livro();
        $livro->excluir($_POST['id']);
        return $livro;
    }
}
    

//VER ESSE ERRO AQUI
    public function buscar()
    {
        $livro = new Livro();
        ABDAY_1 = new Livro();
        $livro->buscar($_POST['titulo'], $_POST['autor']);
        $livro->buscar($_POST['isbn'], $_POST['autor']);
        return $livro;

        if (isset($_POST['']) && isset($_POST[''])) {
            return $livro->buscar($_POST['titulo'], $_POST['autor']);
        }

    }


?>