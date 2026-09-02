<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Biblioteca C's - Pagina de login-box</title>

    <link rel="stylesheet" href="../assets/templates/css/global.css">
     <link rel="stylesheet" href="../assets/templates/css/login.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

 <body>
  <div class="fundo"></div>

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

        <form>
          <div class="campo">
            <label for="user">Email Acadêmico/CPF</label>
            <input type="text" id="user">
          </div>

          <div class="campo">
            <label for="pass">Senha</label>
            <input type="password" id="pass">
          </div>

          <button type="submit">Fazer login</button>

          <p class="footer-text">
            Não tem uma conta? <a href="../View/cadastro.php">Cadastre-se</a>
          </p>
        </form>
      </div>
      
    </div>
  </div>
  <script src="/assets/js/login.js"></script>

 

</body>
</html>