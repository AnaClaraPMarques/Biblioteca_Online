<?php


namespace Controller;

use Model\Emprestimo;

class EmprestimoController
{

private \PDO $connection;

public function __construct(\PDO $connection)
{ 
    $this->connection = $connection; 
    }
public function realizar()
{
    $emprestimo = new Emprestimo($this->connection);

    $id_emprestimo = $_POST['id_emprestimo'];
    $isbn = $_POST['isbn'];
    $id_usuario = $_POST['id_usuario'];
    $data_emprestimo = $_POST['data_emprestimo'];
    $data_devolucao = $_POST['data_devolucao'];

    return $emprestimo->realizar($id_emprestimo,$isbn,$id_usuario,$data_emprestimo,$data_devolucao);
}

public function devolver()
{
    $emprestimo = new Emprestimo($this->connection);

    $id_emprestimo = $_POST['id_emprestimo'];
    $data_devolucao = $_POST['data_devolucao'] ?? date('Y-m-d');

    return ($emprestimo);
}

public function renovar()
{
    $emprestimo = new Emprestimo($this->connection);

    $id_emprestimo = $_POST['id_emprestimo'];
    $nova_data_devolucao = $_POST['nova_data_devolucao'];

    return ($nova_data_devolucao);
}


    public function listarAtrasados()
{
    $emprestimo = new Emprestimo($this->connection);

    return $emprestimo->listarAtrasados(); 
}


public function totalEmprestimos()
{
    $id_usuario = $_POST['id_usuario'];

    $emprestimo = new Emprestimo($this->connection);

    $listaEmprestimosUsuario = $this->totalEmprestimos($id_usuario);

    return ($listaEmprestimosUsuario);
}

}


?>
