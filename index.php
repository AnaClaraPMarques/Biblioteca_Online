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
                <a href="#inicio">Início</a>
                <a href="#livros">Livros</a>
                <a href="#emprestimos">Meus empréstimos</a>
                <a href="View/login.php" class="login">Entrar</a>
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


        <section class="livros">

            <h2>Livros disponíveis</h2>

            <div class="cards">

                <div class="card">

                    <div class="capa">
                        <img src="img/OpequenoPrincipe.jpg" alt="Capa do livro O pequeno Principe">

                    </div>

                    <div class="informacoes">
                        <h3>O Pequeno Príncipe</h3>

                        <p>Antoine de Saint-Exupéry</p>

                        <span>Fantasia</span>

                        <button>Realizar Empréstimo</button>
                    </div>

                </div>


                <div class="card">

                    <div class="capa">
                        <img src="img/DomCasmurro.jpg" alt="Capa do livro Dom Casmurro">

                    </div>

                    <div class="informacoes">
                        <h3>Dom Casmurro</h3>

                        <p>Machado de Assis</p>

                        <span>Romance</span>

                        <button>Realizar Empréstimo</button>
                    </div>

                </div>


                <div class="card">

                    <div class="capa">
                        <img src="img/HarryPotter.jpg" alt="Capa do livro Harry Potter">

                    </div>

                    <div class="informacoes">
                        <h3>Harry Potter</h3>

                        <p>J. K. Rowling</p>

                        <span>Fantasia</span>

                        <button>Realizar Empréstimo</button>
                    </div>
                  </div>
               


                <div class="card">

                    <div class="capa">
                        <img src="img/1984.png" alt="Capa do livro 1984">

                    </div>

                    <div class="informacoes">
                        <h3>1984</h3>

                        <p>George Orwell</p>

                        <span>Romance Distópico</span>

                        <button>Realizar Empréstimo</button>
                    </div>
                </div>

                    
                <div class="card">

                    <div class="capa">
                        <img src="img/CapitaesdeAreia.png" alt="Capa do livro Capitães de Areia">

                    </div>

                    <div class="informacoes">
                        <h3>Capitães de Areia</h3>

                        <p>Jorge Amado</p>

                        <span>Romance Modernista</span>

                        <button>Realizar Empréstimo</button>
                    </div>
                </div>

                </div>

        </section>

       <section class = "emprestimos" id="emprestimos">

            <h2>Meus empréstimos</h2>

            <div class="lista-emprestimos">

                <div class="emprestimo">
                    <h3>O Pequeno Príncipe</h3> <br>
                    <p>Data de empréstimo: 01/06/2026</p>
                    <p>Data de devolução: 15/06/2026</p>
                </div>

                <div class="emprestimo">
                    <h3>Dom Casmurro</h3> <br>
                    <p>Data de empréstimo: 05/06/2026</p>
                    <p>Data de devolução: 20/06/2026</p>
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