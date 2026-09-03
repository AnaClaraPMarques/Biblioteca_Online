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

    $emprestimo->realizar(
        $id_emprestimo,
        $isbn,
        $id_usuario,
        $data_emprestimo,
        $data_devolucao
    );
}

    public function listar()
    {
        // listar empréstimos
    }


    public function devolver()
    {
        // registrar devolução
    }

    public function renovar()
    {
        // renovar empréstimo
    }

    public function atrasados()
    {
        // listar empréstimos atrasados
    }

}

?>
