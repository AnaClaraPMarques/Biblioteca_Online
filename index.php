<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Biblioteca C's</title>

    <link rel="stylesheet" href="assets/templates/css/global.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body>


    <header>
        <nav>
            <h1> Biblioteca C's</h1>

            <div class="menu">
                <a href="#">Início</a>
                <a href="#">Livros</a>
                <a href="#">Meus empréstimos</a>
                <a href="#" class="login">Entrar</a>
            </div>
        </nav>
    </header>


  
    <main>

        <section class="inicio">

            <div class="texto">
                <h2>Encontre seu próximo livro</h2>

                <p>
                    Explore nossa biblioteca e descubra
                    novas histórias para ler.
                </p>

                <div class="pesquisa">
                    <input
                        type="text"
                        placeholder="Pesquise por título ou autor..."
                    >

                    <button>Pesquisar</button>
                </div>
            </div>

        </section>


        <!-- LIVROS -->
        <section class="livros">

            <h2>Livros disponíveis</h2>

            <div class="cards">

                <div class="card">

                    <div class="capa">
                        📖
                    </div>

                    <div class="informacoes">
                        <h3>O Pequeno Príncipe</h3>

                        <p>Antoine de Saint-Exupéry</p>

                        <span>Fantasia</span>

                        <button>Ver detalhes</button>
                    </div>

                </div>


                <div class="card">

                    <div class="capa">
                        📕
                    </div>

                    <div class="informacoes">
                        <h3>Dom Casmurro</h3>

                        <p>Machado de Assis</p>

                        <span>Romance</span>

                        <button>Ver detalhes</button>
                    </div>

                </div>


                <div class="card">

                    <div class="capa">
                        📗
                    </div>

                    <div class="informacoes">
                        <h3>Harry Potter</h3>

                        <p>J. K. Rowling</p>

                        <span>Fantasia</span>

                        <button>Ver detalhes</button>
                    </div>

                </div>

            </div>

        </section>

    </main>



    <footer>

        <p>© 2026 Biblioteca C's — Biblioteca Online</p>

    </footer>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</body>
</html>