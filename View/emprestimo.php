<?php

require_once __DIR__ . '/config/configuration.php';
require_once __DIR__ . '/Model/Connection.php';
require_once __DIR__ . '/Model/Emprestimo.php';
require_once __DIR__ . '/Controller/EmprestimoController.php';

use Model\Connection;
use Controller\EmprestimoController;

$connection = Connection::getInstance();

$controller = new EmprestimoController($connection);

$acao = $_POST['acao'] ?? '';

if ($acao === 'realizar') {

    $controller->realizar();

    header('Location: index.php');
    exit;

}

if ($acao === 'renovar') {

    $controller->renovar();

    header('Location: index.php');
    exit;

}

if ($acao === 'devolver') {

    $controller->devolver();

    header('Location: index.php');
    exit;

}

echo "Ação inválida.";

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Realizar Empréstimo - Biblioteca C's</title>

<link rel="stylesheet" href="../assets/templates/css/global.css">

</head>

<body>

<header>

    <nav>

        <h1>Biblioteca C's</h1>

        <div class="menu">

            <a href="../index.php">Início</a>

            <a href="../index.php#livros">Livros</a>

            <a href="../index.php#emprestimos">
                Meus empréstimos
            </a>

        </div>

    </nav>

</header>


<main class="pagina-emprestimo">

    <div class="caixa-emprestimo">

        <h2>Realizar empréstimo</h2>

        <p class="descricao">
            Confira as informações do livro antes de confirmar o empréstimo.
        </p>


        <div class="livro-selecionado">

            <img
                src="<?php echo $livros['imagem']; ?>"
                alt="Capa do livro <?php echo $livro['titulo']; ?>"
            >

            <div>

                <h3>
                    <?php echo $livro["titulo"]; ?>
                </h3>

                <p>
                    <?php echo $livro["autor"]; ?>
                </p>

                <span>
                    <?php echo $livro["categoria"]; ?>
                </span>

            </div>

        </div>


       <form method="POST" action="../Emprestimo.php">

    <input
        type="hidden"
        name="acao"
        value="realizar"
    >

    <input
        type="hidden"
        name="isbn"
        value="<?php
            $isbnLivros = [
                'pequeno-principe' => '975',
                'dom-casmurro' => '978',
                'harry-potter' => '973',
                '1984' => '979',
                'capitaes-de-areia' => '974'
            ];

            echo $isbnLivros[$livroSelecionado] ?? '975';
        ?>"
    >

    <input
        type="hidden"
        name="id_usuario"
        value="2"
    >

    <div class="informacoes-emprestimo">

        <div>

            <strong>Data do empréstimo:</strong>

            <p>
                <?= date('d/m/Y') ?>
            </p>

            <input
                type="hidden"
                name="data_emprestimo"
                value="<?= date('Y-m-d') ?>"
            >

        </div>


        <div>

            <strong>Data de devolução:</strong>

            <p>
                <?= date('d/m/Y', strtotime('+14 days')) ?>
            </p>

            <input
                type="hidden"
                name="data_devolucao"
                value="<?= date('Y-m-d', strtotime('+14 days')) ?>"
            >

        </div>

    </div>


    <div class="botoes">

        <a
            href="../index.php#livros"
            class="cancelar"
        >
            Cancelar
        </a>

        <button
            type="submit"
            class="confirmar"
        >
            Confirmar empréstimo
        </button>

    </div>

</form>


    </div>

</main>


<footer>

    <p>
        © 2026 Biblioteca C's — Biblioteca Online
    </p>

</footer>

</body>

</html>
