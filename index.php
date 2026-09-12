<?php

require_once __DIR__ . '/config/configuration.php';
require_once __DIR__ . '/Model/Connection.php';
require_once __DIR__ . '/Model/Emprestimo.php';

use Model\Connection;
use Model\Emprestimo;

$connection = Connection::getInstance();
echo "BANCO CONECTADO!";

$emprestimoModel = new Emprestimo($connection);

$id_usuario = 2;

$emprestimos = $emprestimoModel->listarPorUsuario($id_usuario);

?>


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
 
                <form class="pesquisa" method="GET" action="View/buscarLivros.php">
                    <input
                        type="text"
                        name="q"
                        placeholder="Pesquise por título ou autor..."
                    >
 
                    <button type="submit">Pesquisar</button>
                </form>
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
 
                      
                       <a href="View/emprestimo.php?livro=pequeno-principe" class="botao-emprestimo">Realizar Empréstimo</a>
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
 
                       
<a href="View/emprestimo.php?livro=dom-casmurro" class="botao-emprestimo">
    Realizar Empréstimo
</a>
                    </div>
 
                </div>
 
 
                <div class="card">
 
                    <div class="capa">
                        <img src="img/HarryPotter.jpg" alt="Capa do livro Harry Potter">
 
                    </div>
 
                    <div class="informacoes">
                        <h3>Harry Potter e a Pedra Filosofal</h3>
 
                        <p>J. K. Rowling</p>
 
                        <span>Fantasia</span>
                     
<a href="View/emprestimo.php?livro=harry-potter" class="botao-emprestimo">
    Realizar Empréstimo
</a>
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
 
                   
<a href="View/emprestimo.php?livro=1984" class="botao-emprestimo">
    Realizar Empréstimo
</a>
 
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
 
<a href="View/emprestimo.php?livro=capitaes-de-areia" class="botao-emprestimo">
    Realizar Empréstimo
</a>
                    </div>
                </div>
 
                </div>
 
        </section>
 
       <section class = "emprestimos" id="emprestimos">
 
            <h2>Meus empréstimos</h2>
 
            <div class="lista-emprestimos">
 
               <div class="lista-emprestimos">

    <?php if (empty($emprestimos)): ?>

        <p>Nenhum empréstimo realizado.</p>

    <?php else: ?>

        <?php foreach ($emprestimos as $emprestimo): ?>

            <div class="emprestimo">

                <h3>
                    <?= htmlspecialchars($emprestimo['titulo']) ?>
                </h3>

                <p>
                    Data de empréstimo:
                    <?= date(
                        'd/m/Y',
                        strtotime($emprestimo['data_emprestimo'])
                    ) ?>
                </p>

                <p>
                    Data de devolução:
                    <?= date(
                        'd/m/Y',
                        strtotime($emprestimo['data_devolucao'])
                    ) ?>
                </p>

                <form method="POST" action="Emprestimo.php">

                    <input
                        type="hidden"
                        name="acao"
                        value="renovar"
                    >

                    <input
                        type="hidden"
                        name="id_emprestimo"
                        value="<?= $emprestimo['id_emprestimo'] ?>"
                    >

                    <input
                        type="date"
                        name="nova_data_devolucao"
                        required
                    >

                    <button type="submit">
                        Renovar
                    </button>

                </form>

                <form method="POST" action="Emprestimo.php">

                    <input
                        type="hidden"
                        name="acao"
                        value="devolver"
                    >

                    <input
                        type="hidden"
                        name="id_emprestimo"
                        value="<?= $emprestimo['id_emprestimo'] ?>"
                    >

                    <button type="submit">
                        Devolver
                    </button>

                </form>

            </div>

        <?php endforeach; ?>

    <?php endif; ?>

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