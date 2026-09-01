<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BiblioTech - Biblioteca Online</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- CABEÇALHO -->
    <header>

        <h1>📚 BiblioTech</h1>

        <nav>
            <a href="index.php">Início</a>
            <a href="livros/index.php">Livros</a>
            <a href="pages/login.php">Login</a>
            <a href="pages/cadastro.php">Cadastro</a>
        </nav>

    </header>


    <!-- CONTEÚDO PRINCIPAL -->
    <main>

        <!-- APRESENTAÇÃO -->
        <section>

            <h2>Bem-vindo à BiblioTech! 📖</h2>

            <p>
                Encontre livros, consulte nosso catálogo
                e faça seus empréstimos de forma simples.
            </p>

            <a href="livros/index.php" class="btn">
                Ver livros
            </a>

        </section>


        <!-- LIVROS EM DESTAQUE -->
        <section>

            <h2>Livros em destaque</h2>

            <div class="livros">

                <!-- LIVRO 1 -->
                <div class="card">

                    <h3>Dom Casmurro</h3>

                    <p>
                        Autor: Machado de Assis
                    </p>

                    <p>
                        Gênero: Romance
                    </p>

                    <a href="livros/detalhes.php" class="btn">
                        Ver detalhes
                    </a>

                </div>


                <!-- LIVRO 2 -->
                <div class="card">

                    <h3>O Pequeno Príncipe</h3>

                    <p>
                        Autor: Antoine de Saint-Exupéry
                    </p>

                    <p>
                        Gênero: Fantasia
                    </p>

                    <a href="livros/detalhes.php" class="btn">
                        Ver detalhes
                    </a>

                </div>


                <!-- LIVRO 3 -->
                <div class="card">

                    <h3>Harry Potter</h3>

                    <p>
                        Autor: J. K. Rowling
                    </p>

                    <p>
                        Gênero: Fantasia
                    </p>

                    <a href="livros/detalhes.php" class="btn">
                        Ver detalhes
                    </a>

                </div>

            </div>

        </section>

    </main>


    <!-- RODAPÉ -->
    <footer>

        <p>
            © 2026 BiblioTech - Biblioteca Online
        </p>

    </footer>

</body>

</html>