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

        $isbn = $_POST['isbn'];
        $id_usuario = $_POST['id_usuario'];
        $data_emprestimo = $_POST['data_emprestimo'];
        $data_devolucao = $_POST['data_devolucao'];

        return $emprestimo->realizar(
            $isbn,
            $id_usuario,
            $data_emprestimo,
            $data_devolucao
        );
    }

    public function listarPorUsuario(int $id_usuario)
    {
        $emprestimo = new Emprestimo($this->connection);

        return $emprestimo->listarPorUsuario($id_usuario);
    }

    public function devolver()
    {
        $emprestimo = new Emprestimo($this->connection);

        $id_emprestimo = $_POST['id_emprestimo'];

        return $emprestimo->devolver($id_emprestimo);
    }

   public function renovar()
{
    $emprestimo = new Emprestimo($this->connection);

    $id_emprestimo = (int) ($_POST['id_emprestimo'] ?? 0);
    $nova_data_devolucao = $_POST['nova_data_devolucao'] ?? '';

    if (!$id_emprestimo || !$nova_data_devolucao) {
        echo "Dados para renovação incompletos.";
        return;
    }

    $resultado = $emprestimo->renovar(
        $id_emprestimo,
        $nova_data_devolucao
    );

    if (!$resultado) {
        echo "Erro ao renovar empréstimo.";
        return;
    }
}

    public function listarAtrasados()
    {
        $emprestimo = new Emprestimo($this->connection);

        return $emprestimo->listarAtrasados();
    }
}
