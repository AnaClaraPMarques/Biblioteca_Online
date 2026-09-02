<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Biblioteca C's - Página de Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous">

    <link rel="stylesheet" href="../assets/templates/css/global.css">
    <link rel="stylesheet" href="../assets/templates/css/login.css">
    <link rel="stylesheet" href="../assets/templates/css/cadastro.css">
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


    <main>


            <form id="formCadastro">
   <div class="container">
    <div class="conteudo">
      

      <div class="login-box">
        <div class="icone-usuario">
  <i class="bi bi-person-circle"></i>
</div>

<div id="mensagem-erro" class="msg-erro">
    <span class="icone">⚠️</span>
    <span class="texto">Usuário não encontrado.</span>
</div>

        <div class="nome_completo">
                    <label for="inputname" class="form-label">
                        Nome Completo
                    </label>

                    <input type="text"
                        class="form-control"
                        id="inputname">
                </div>

                <div class="email_academico">
                    <label for="inputemail" class="form-label">
                        E-mail acadêmico
                    </label>

                    <input type="email"
                        class="form-control"
                        id="inputemail">
                </div>

                <div class="criacao_senha">
                    <label for="inputpassword" class="form-label">
                        Criar senha
                    </label>

                    <input type="password"
                        class="form-control"
                        id="inputpassword">
                </div>

                <div class="confirmacao_senha">
                    <label for="inputconfirmpassword" class="form-label">
                        Confirmar senha
                    </label>

                    <input type="password"
                        class="form-control"
                        id="inputconfirmpassword">
                </div>

          <button type="submit">Fazer cadastro</button>

          <p class="footer-text">
            Já tem uma conta? <a href="../View/login.php">Faça login</a>
          </p>
                
                
            </form>

        </div>

    </main>


    <script src="../assets/js/cadastro.js"></script>

</body>

</html>
