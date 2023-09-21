<?php
include('protecao.php');
?>

<?php
session_start(); // Certifique-se de iniciar a sessão em todas as páginas que usam informações da sessão.

// Verifique se o usuário está logado. Se não, redirecione para a página de login.
if (!isset($_SESSION['email'])) {
  header("Location: index");
  exit();
}

$nomeEmail = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel do Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./node_modules/bootstrap/custom.scss">

  <style>
    body,
    html {
      height: 100%;
      margin: 0;
      padding: 0;
      /* Adicionando padding 0 para garantir que não haja espaço extra */
    }

    .background {
      /* fundo e configurações */
      background: linear-gradient(to bottom right, #87f600, #3e6909, #000000);
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;

      /* Tornar a imagem cobrir 100% da tela */
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }
  </style>
</head>

<body class="background">

  <nav class="navbar navbar-light mx-auto p-3">
    <form class="form-inline">
      <button type="button" class="btn btn-danger" type="button"><a href="./logout"
          class="text-white link-offset-2 link-underline link-underline-opacity-0">Sair</a></button>
    </form>
  </nav>


  <div class="container">
    <div class="d-flex justify-content-center text-light">
      <h1>Bem-vindo!</h1>
    </div>
    <div class="d-flex justify-content-center text-light">
      <p>Esta é a página do seu painel de usuário.</p>
    </div>
    <div class="d-flex justify-content-center text-light">
      <p>Em breve iremos atualizar!</p>
    </div>
  </div>

</body>

<script src="./js/script_.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</html>