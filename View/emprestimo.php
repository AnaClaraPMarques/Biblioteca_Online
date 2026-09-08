<?php

$livros = [

    "pequeno-principe" => [
        "titulo" => "O Pequeno Príncipe",
        "autor" => "Antoine de Saint-Exupéry",
        "categoria" => "Fantasia",
        "imagem" => "../img/OpequenoPrincipe.jpg"
    ],

    "dom-casmurro" => [
        "titulo" => "Dom Casmurro",
        "autor" => "Machado de Assis",
        "categoria" => "Romance",
        "imagem" => "../img/DomCasmurro.jpg"
    ],

    "harry-potter" => [
        "titulo" => "Harry Potter",
        "autor" => "J. K. Rowling",
        "categoria" => "Fantasia",
        "imagem" => "../img/HarryPotter.jpg"
    ],

    "1984" => [
        "titulo" => "1984",
        "autor" => "George Orwell",
        "categoria" => "Romance Distópico",
        "imagem" => "../img/1984.png"
    ],

    "capitaes-de-areia" => [
        "titulo" => "Capitães de Areia",
        "autor" => "Jorge Amado",
        "categoria" => "Romance Modernista",
        "imagem" => "../img/CapitaesdeAreia.png"
    ]

];

$livroSelecionado = $_GET["livro"] ?? "pequeno-principe";

$livro = $livros[$livroSelecionado] ?? $livros["pequeno-principe"];

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
                src="<?php echo $livro['imagem']; ?>"
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


        <div class="informacoes-emprestimo">

            <div>

                <strong>Data do empréstimo:</strong>

                <p>
                    02/09/2026
                </p>

            </div>


            <div>

                <strong>Data de devolução:</strong>

                <p>
                    16/09/2026
                </p>

            </div>

        </div>


        <div class="botoes">

            <a
                href="../index.php#livros"
                class="cancelar"
            >
                Cancelar
            </a>

            <button class="confirmar">
                Confirmar empréstimo
            </button>

        </div>

    </div>

</main>


<footer>

    <p>
        © 2026 Biblioteca C's — Biblioteca Online
    </p>

</footer>

</body>

</html>
