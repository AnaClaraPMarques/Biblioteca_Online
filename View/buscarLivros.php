<?php

require_once __DIR__ . '/../config/configuration.php';
require_once __DIR__ . '/../Model/Connection.php';
require_once __DIR__ . '/../Model/Livro.php';

use Model\Connection;
use Model\Livro;

$connection = Connection::getInstance();

$termo = trim($_GET['q'] ?? '');

$livroModel = new Livro($connection);

$resultados = $termo !== ''
    ? $livroModel->buscar($termo)
    : $livroModel->listarTodos();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>Buscar livros - Biblioteca C's</title>
 
    <link rel="stylesheet" href="../assets/templates/css/global.css">
</head>
 
<body>
 
    <header>
        <nav>
            <h1> Biblioteca C's</h1>
 
            <div class="menu">
                <a href="../index.php">Início</a>
                <a href="../index.php#livros">Livros</a>
                <a href="../index.php#emprestimos">Meus empréstimos</a>
                <a href="login.php" class="login">Entrar</a>
            </div>
        </nav>
    </header>
 
    <main>
 
        <section class="inicio">
 
            <div class="texto">
                <h2>Buscar livros</h2>
 
                <p>
                    <?php if ($termo !== ''): ?>
                        <?php echo count($resultados); ?> resultado(s) para "<?php echo htmlspecialchars($termo); ?>".
                    <?php else: ?>
                        Mostrando todos os livros disponíveis.
                    <?php endif; ?>
                </p>
 
                <form class="pesquisa" method="GET" action="Livro.php">
                    <input
                        type="text"
                        name="q"
                        placeholder="Pesquise por título ou autor..."
                        value="<?php echo htmlspecialchars($termo); ?>"
                    >
 
                    <button type="submit">Pesquisar</button>
                </form>
            </div>
 
        </section>
 
 
        <section class="livros">
 
            <h2>Resultado da busca</h2>
 
            <div class="cards">
 
                <?php if (empty($resultados)): ?>
 
                    <p>Nenhum livro encontrado.</p>
 
                <?php else: ?>
 
                    <?php foreach ($resultados as $livro): ?>
 
                        <div class="card">
 
                            <div class="capa"></div>
 
                            <div class="informacoes">
                                <h3><?php echo htmlspecialchars($livro['titulo']); ?></h3>
 
                                <p><?php echo htmlspecialchars($livro['autor']); ?></p>
 
                                <span><?php echo htmlspecialchars($livro['genero']); ?></span>
 
                                <a
                                    href="emprestimo.php?isbn=<?php echo urlencode($livro['isbn']); ?>"
                                    class="botao-emprestimo"
                                >
                                    Realizar Empréstimo
                                </a>
                            </div>
 
                        </div>
 
                    <?php endforeach; ?>
 
                <?php endif; ?>
 
            </div>
 
        </section>
 
    </main>
 
    <footer>
        <p>© 2026 Biblioteca C's — Biblioteca Online</p>
    </footer>
 
</body>
</html>
 