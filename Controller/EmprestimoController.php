<?php


namespace Controller;

use Model\Emprestimo;

class EmprestimoController
{


public function realizar()
{
    $emprestimo = new Emprestimo();

    $id_emprestimo = $_POST['id_emprestimo'];
    $isbn = $_POST['isbn'];
    $id_usuario = $_POST['id_usuario'];
    $data_emprestimo = $_POST['data_emprestimo'];
    $data_devolucao = $_POST['data_devolucao'];

    $emprestimo->realizar($id_emprestimo,$isbn,$id_usuario,$data_emprestimo,$data_devolucao);
}


public function devolver()
{
    $emprestimo = new Emprestimo();

    $id_emprestimo = $_POST['id_emprestimo'];
    $data_devolucao = $_POST['data_devolucao'] ?? date('Y-m-d');

    $emprestimo->devolver($id_emprestimo, $data_devolucao);
}

public function renovar()
{
    $emprestimo = new Emprestimo();

    $id_emprestimo = $_POST['id_emprestimo'];
    $nova_data_devolucao = $_POST['nova_data_devolucao'];

    $emprestimo->renovar($id_emprestimo, $nova_data_devolucao);
}

<<<<<<< HEAD
    public function listarAtrasados()
=======
    public function atrasados()
{
    $emprestimo = new Emprestimo();

    $listaAtrasados = $emprestimo->atrasados();

    return $listaAtrasados;
}

public function emprestimosUsuario($id_usuario){

    $emprestimo = new Emprestimo();

    $listaEmprestimosUsuario = $emprestimo->listarEmprestimosUsuario($id_usuario);

    return $listaEmprestimosUsuario;
}

    public function totalEmprestimos()

>>>>>>> d4fca129daad68f187ff91b0f487bc2d4d753e54
    {
        $id_usuario = $_POST['id_usuario'];

        $emprestimo = new Emprestimo();
        $listaAtrasados = $emprestimo->listar();
        $listaEmprestimosUsuario = $this->emprestimosUsuario($id_usuario);
        return $listaAtrasados && $listaEmprestimosUsuario;
    }

}

?>
