<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./node_modules/bootstrap/custom.scss">

</head>

<body>
  <div class="background">
    <div class="container p-5">
      <form method="post" action="" class="form shadow position-absolute top-50 start-50 translate-middle rounded-4">
        <h2>Login</h2>
        <div class="flex-column">
          <label>E-mail</label>
        </div>
        <div class="inputForm"><i class="bi bi-person"></i>
          <input type="text" id="email" for="email" name="email" class="input" placeholder="Digite seu e-mail" required>
        </div>

        <div class="flex-column">
          <label>Senha</label>
        </div>
        <div class="inputForm">
          <i class="bi bi-lock"></i>
          <input type="password" id="passwordInput" id="senha" name="senha" for="senha" class="input"
            placeholder="Digite sua senha" required>
          <i style="cursor: pointer; padding: 10px;" id="showPassword"></i>
        </div>

        <div class="flex-row">
          <div>
            <input type="checkbox">
            <label>Lembrar de mim</label>
          </div>
          <span class="span"><a href="esqueceusenha">Esqueceu sua senha?</a></span>
        </div>
        <button type="submit" class="button-submit">Login</button>


        <?php

        // Conexão com o banco de dados (substitua pelos seus próprios dados)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "nome_banco_de_dados";
        
        // Cria a conexão
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Verifica a conexão
        if ($conn->connect_error) {
            die("<br><div style='text-align:center; color:#ba1c1c;'>Falha na conexão: " . $conn->connect_error . "</div>");
        }
        
        if (isset($_POST['email']) && isset($_POST['senha'])) {
            $email = $conn->real_escape_string($_POST['email']);
            $senha = $conn->real_escape_string($_POST['senha']);
        
            $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
            $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);
        
            $quantidade = $sql_query->num_rows;
        
            if ($quantidade == 1) {
                $row = $sql_query->fetch_assoc();
        
                if (!isset($_SESSION)) {
                    session_start();
                }
        
                $_SESSION['email'] = $row['email'];
                $_SESSION['senha'] = $row['senha'];
        
                // Redireciona para a página personalizada do usuário
                header("Location: painel.php?email=" . $row['email']);
                exit(); // Certifica-se de que não há mais saída após o redirecionamento
            } else {
                echo "<br><div style='color: #ff0000; text-align: center;'>E-mail ou senha incorretos</div>";
            }
        }
        
        $conn->close();
        ?>
        

        <p class="p">Não possui conta? <span class="span"><a href="criarconta">Cadastre-se</a></span>

        <div class="flex-row">
          <button class="btn google shadow"><a href="">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="" viewBox="0 0 101.996 102" id="instagram">
                <defs>
                  <radialGradient id="a" cx="13.551" cy="102.482" r="133.147" gradientUnits="userSpaceOnUse">
                    <stop offset=".09" stop-color="#fa8f21"></stop>
                    <stop offset=".78" stop-color="#d82d7e"></stop>
                  </radialGradient>
                  <radialGradient id="b" cx="61.859" cy="107.051" r="104.938" gradientUnits="userSpaceOnUse">
                    <stop offset=".64" stop-color="#8c3aaa" stop-opacity="0"></stop>
                    <stop offset="1" stop-color="#8c3aaa"></stop>
                  </radialGradient>
                </defs>
                <path fill="url(#a)"
                  d="M34,51A17,17,0,1,1,51,68,17,17,0,0,1,34,51m-9.191,0A26.188,26.188,0,1,0,51,24.812,26.187,26.187,0,0,0,24.812,51M72.1,23.774a6.12,6.12,0,1,0,6.122-6.118h0a6.123,6.123,0,0,0-6.12,6.118M30.4,92.513a28.187,28.187,0,0,1-9.471-1.754,15.85,15.85,0,0,1-5.866-3.815,15.735,15.735,0,0,1-3.815-5.862A28.161,28.161,0,0,1,9.49,71.611c-.247-5.376-.3-6.991-.3-20.61s.053-15.23.3-20.61a28.374,28.374,0,0,1,1.754-9.471,15.85,15.85,0,0,1,3.815-5.866,15.718,15.718,0,0,1,5.866-3.815A28.161,28.161,0,0,1,30.4,9.484c5.376-.247,6.991-.3,20.6-.3s15.23.053,20.61.3a28.373,28.373,0,0,1,9.471,1.754,15.8,15.8,0,0,1,5.866,3.815,15.8,15.8,0,0,1,3.815,5.866,28.162,28.162,0,0,1,1.754,9.471c.247,5.38.3,6.991.3,20.61s-.049,15.23-.3,20.61a28.294,28.294,0,0,1-1.754,9.471,16.886,16.886,0,0,1-9.681,9.677,28.161,28.161,0,0,1-9.471,1.754c-5.376.247-6.991.3-20.61.3s-15.23-.049-20.6-.3M29.974.309A37.4,37.4,0,0,0,17.595,2.678,25.015,25.015,0,0,0,8.56,8.56a24.918,24.918,0,0,0-5.883,9.034A37.407,37.407,0,0,0,.309,29.974C.058,35.412,0,37.15,0,51S.058,66.588.309,72.026A37.405,37.405,0,0,0,2.678,84.405,24.931,24.931,0,0,0,8.56,93.44a25.076,25.076,0,0,0,9.034,5.883,37.43,37.43,0,0,0,12.379,2.369c5.441.247,7.176.309,21.026.309s15.588-.058,21.026-.309a37.405,37.405,0,0,0,12.379-2.369A26.075,26.075,0,0,0,99.322,84.405a37.3,37.3,0,0,0,2.369-12.379c.247-5.442.3-7.176.3-21.026s-.058-15.588-.3-21.026a37.394,37.394,0,0,0-2.369-12.379A25.08,25.08,0,0,0,93.44,8.56a24.955,24.955,0,0,0-9.03-5.883A37.347,37.347,0,0,0,72.03.309C66.593.062,64.854,0,51,0s-15.59.058-21.03.309"
                  data-name="Path 14"></path>
                <path fill="url(#b)"
                  d="M34,51A17,17,0,1,1,51,68,17,17,0,0,1,34,51m-9.191,0A26.188,26.188,0,1,0,51,24.812,26.187,26.187,0,0,0,24.812,51M72.1,23.774a6.12,6.12,0,1,0,6.122-6.118h0a6.123,6.123,0,0,0-6.12,6.118M30.4,92.513a28.187,28.187,0,0,1-9.471-1.754,15.85,15.85,0,0,1-5.866-3.815,15.735,15.735,0,0,1-3.815-5.862A28.161,28.161,0,0,1,9.49,71.611c-.247-5.376-.3-6.991-.3-20.61s.053-15.23.3-20.61a28.374,28.374,0,0,1,1.754-9.471,15.85,15.85,0,0,1,3.815-5.866,15.718,15.718,0,0,1,5.866-3.815A28.161,28.161,0,0,1,30.4,9.484c5.376-.247,6.991-.3,20.6-.3s15.23.053,20.61.3a28.373,28.373,0,0,1,9.471,1.754,15.8,15.8,0,0,1,5.866,3.815,15.8,15.8,0,0,1,3.815,5.866,28.162,28.162,0,0,1,1.754,9.471c.247,5.38.3,6.991.3,20.61s-.049,15.23-.3,20.61a28.294,28.294,0,0,1-1.754,9.471,16.886,16.886,0,0,1-9.681,9.677,28.161,28.161,0,0,1-9.471,1.754c-5.376.247-6.991.3-20.61.3s-15.23-.049-20.6-.3M29.974.309A37.4,37.4,0,0,0,17.595,2.678,25.015,25.015,0,0,0,8.56,8.56a24.918,24.918,0,0,0-5.883,9.034A37.407,37.407,0,0,0,.309,29.974C.058,35.412,0,37.15,0,51S.058,66.588.309,72.026A37.405,37.405,0,0,0,2.678,84.405,24.931,24.931,0,0,0,8.56,93.44a25.076,25.076,0,0,0,9.034,5.883,37.43,37.43,0,0,0,12.379,2.369c5.441.247,7.176.309,21.026.309s15.588-.058,21.026-.309a37.405,37.405,0,0,0,12.379-2.369A26.075,26.075,0,0,0,99.322,84.405a37.3,37.3,0,0,0,2.369-12.379c.247-5.442.3-7.176.3-21.026s-.058-15.588-.3-21.026a37.394,37.394,0,0,0-2.369-12.379A25.08,25.08,0,0,0,93.44,8.56a24.955,24.955,0,0,0-9.03-5.883A37.347,37.347,0,0,0,72.03.309C66.593.062,64.854,0,51,0s-15.59.058-21.03.309"
                  data-name="Path 15"></path>
              </svg>
            </a></button>

          <button class="btn instagram shadow"><a href="">
              <svg version="1.1" width="20" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <path style="fill:#FBBB00;" d="M113.47,309.408L95.648,375.94l-65.139,1.378C11.042,341.211,0,299.9,0,256
  c0-42.451,10.324-82.483,28.624-117.732h0.014l57.992,10.632l25.404,57.644c-5.317,15.501-8.215,32.141-8.215,49.456
  C103.821,274.792,107.225,292.797,113.47,309.408z"></path>
                <path style="fill:#518EF8;" d="M507.527,208.176C510.467,223.662,512,239.655,512,256c0,18.328-1.927,36.206-5.598,53.451
  c-12.462,58.683-45.025,109.925-90.134,146.187l-0.014-0.014l-73.044-3.727l-10.338-64.535
  c29.932-17.554,53.324-45.025,65.646-77.911h-136.89V208.176h138.887L507.527,208.176L507.527,208.176z"></path>
                <path style="fill:#28B446;" d="M416.253,455.624l0.014,0.014C372.396,490.901,316.666,512,256,512
  c-97.491,0-182.252-54.491-225.491-134.681l82.961-67.91c21.619,57.698,77.278,98.771,142.53,98.771
  c28.047,0,54.323-7.582,76.87-20.818L416.253,455.624z"></path>
                <path style="fill:#F14336;" d="M419.404,58.936l-82.933,67.896c-23.335-14.586-50.919-23.012-80.471-23.012
  c-66.729,0-123.429,42.957-143.965,102.724l-83.397-68.276h-0.014C71.23,56.123,157.06,0,256,0
  C318.115,0,375.068,22.126,419.404,58.936z"></path>

              </svg>
            </a></button>
          <button class="btn apple shadow"><a href="">
              <svg version="1.1" height="20" width="20" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 22.773 22.773"
                style="enable-background:new 0 0 22.773 22.773;" xml:space="preserve">
                <g>
                  <g>
                    <path
                      d="M15.769,0c0.053,0,0.106,0,0.162,0c0.13,1.606-0.483,2.806-1.228,3.675c-0.731,0.863-1.732,1.7-3.351,1.573 c-0.108-1.583,0.506-2.694,1.25-3.561C13.292,0.879,14.557,0.16,15.769,0z">
                    </path>
                    <path
                      d="M20.67,16.716c0,0.016,0,0.03,0,0.045c-0.455,1.378-1.104,2.559-1.896,3.655c-0.723,0.995-1.609,2.334-3.191,2.334 c-1.367,0-2.275-0.879-3.676-0.903c-1.482-0.024-2.297,0.735-3.652,0.926c-0.155,0-0.31,0-0.462,0 c-0.995-0.144-1.798-0.932-2.383-1.642c-1.725-2.098-3.058-4.808-3.306-8.276c0-0.34,0-0.679,0-1.019 c0.105-2.482,1.311-4.5,2.914-5.478c0.846-0.52,2.009-0.963,3.304-0.765c0.555,0.086,1.122,0.276,1.619,0.464 c0.471,0.181,1.06,0.502,1.618,0.485c0.378-0.011,0.754-0.208,1.135-0.347c1.116-0.403,2.21-0.865,3.652-0.648 c1.733,0.262,2.963,1.032,3.723,2.22c-1.466,0.933-2.625,2.339-2.427,4.74C17.818,14.688,19.086,15.964,20.67,16.716z">
                    </path>
                  </g>
                </g>
              </svg>
            </a></button>
        </div>

      </form>
    </div>
</body>
<script src="./js/script_.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</html>