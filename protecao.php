<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagina protegida</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./node_modules/bootstrap/custom.scss">

  <style>
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



    .form {
      display: flex;
      flex-direction: column;
      gap: 10px;
      background-color: #ffffff;
      padding: 30px;
      width: 350px;
      border-radius: 20px;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    ::placeholder {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    .form button {
      align-self: flex-end;
    }

    .flex-column>label {
      color: #151717;
      font-weight: 600;
    }

    .inputForm {
      border: 1.5px solid #ecedec;
      border-radius: 10px;
      height: 50px;
      display: flex;
      align-items: center;
      padding-left: 10px;
      transition: 0.2s ease-in-out;
    }

    .input {
      margin-left: 10px;
      border-radius: 10px;
      border: none;
      width: 85%;
      height: 100%;
    }

    .input:focus {
      outline: none;
    }

    .inputForm:focus-within {
      border: 1.5px solid #2d79f3;
    }

    .flex-row {
      display: flex;
      flex-direction: row;
      align-items: center;
      gap: 10px;
      justify-content: space-between;
    }

    .flex-row>div>label {
      font-size: 14px;
      color: black;
      font-weight: 400;
    }

    .span {
      font-size: 14px;
      margin-left: 5px;
      color: #2d79f3;
      font-weight: 500;
      cursor: pointer;
    }

    .button-submit {
      margin: 20px 0 10px 0;
      background-color: #151717;
      border: none;
      color: white;
      font-size: 15px;
      font-weight: 500;
      border-radius: 10px;
      height: 50px;
      width: 100%;
      cursor: pointer;
    }

    .button-submit:hover {
      background-color: #252727;
    }
  </style>
</head>

<body>

  <?php
  if (!isset($_SESSION)) {
    session_start();
  }

  function protegerPagina()
  {
    if (!isset($_SESSION['email'])) {
      echo "<body>
                    <div class='background'>
                        <div class='container p-5'>
                            <div class='form shadow position-absolute top-50 start-50 translate-middle rounded-4'>
                                <h2 style='text-align: center;'>Você não pode acessar esta página porque não está logado.</h1>";
      "</div>";
      "</div>";

      echo "<a href='index.php' class='btn' style='background-color:#000000; color:white;'>
                        <b>ENTRAR</b>
                        </a>
                    </div>
                </body>";
      die();
    }
  }

  // Chame a função de proteção no início da página
  protegerPagina();
  ?>

</body>

<script src="./js/script_.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</html>