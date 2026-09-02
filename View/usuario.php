<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Biblioteca C's</title>

    <link rel="stylesheet" href="../assets/templates/css/usuario.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body>

 <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
        <div class="vw-plugin-top-wrapper"></div>
    </div>
</div>

<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
<script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
</script>



    <header>
        <nav>
            <h1> Biblioteca C's</h1>

            <div class="menu">
                <a href="index.php">Início</a>
                <a href="View/livros.php">Livros</a>
                <a href="View/emprestimos.php">Meus empréstimos</a>
                <a href="#container" class="login">Minha Conta</a>
            </div>
        </nav>
    </header>

    <main>

        <div class="container">


         <section id="perfil" class="page active">
            <h1 class="page-title">Meu Perfil</h1> <br>

            <div class="profile-grid">
                
                <form class="form-card" id="profile-form" onsubmit="event.preventDefault();">
                    <div class="form-group">
                        <label>Nome completo</label>
                        <input type="text" id="input-nome" value="Ana Luisa">
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" id="input-email" value="analuisa@ba.estudante.senai.br">
                    </div>
                    <div class="form-group">
                        <label>CPF</label>
                        <input type="text" id="input-cpf" value="000.000.000-00">
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" id="input-senha" value="112233445566">
                    </div>
                  
                    
                    <div class="form-actions">
                        <button type="button" class="btn" id="btn-salvar">Salvar Informações</button>
                    </div>
                </form>

               
        

            </div>


        </section>

  

</div>
    </main>



    <footer>

        <p>© 2026 Biblioteca C's — Biblioteca Online</p>

    </footer>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</body>
</html>