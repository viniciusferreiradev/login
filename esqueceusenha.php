<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueceu a senha</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/custom.scss">

</head>

<body>
    <div class="background">
        <div class="container">
            <form method="post" action=""
                class="form shadow position-absolute top-50 start-50 translate-middle rounded-4">
                <h2>Esqueceu a senha</h2>

                <div class="flex-column">
                    <label>Email</label>
                </div>
                <div class="inputForm"><i class="bi bi-envelope"></i>
                    <input type="email" id="email" name="email" class="input" name="email" placeholder="E-mail"
                        required>
                </div>
                <button type="submit" class="button-submit">Enviar Codigo</button>

                <p class="p">Voltar ao<span class="span"><a href="index">Login</a></span>

                    <?php

                    // Conexão com o banco de dados (substitua pelos seus próprios dados)
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "nome_banco_de_dados";

                    // Conecta ao banco de dados
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Verifica a conexão
                    if ($conn->connect_error) {
                        die("<br><div style='text-align:center; color:#ba1c1c;'>Falha na conexão:</div>" . $conn->connect_error);
                    }
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        $email = $conn->real_escape_string($_POST['email']);

                        // Verifica se o e-mail já está cadastrado
                        $check_query = "SELECT * FROM usuarios WHERE email='$email'";
                        $check_result = $conn->query($check_query);

                        if ($check_result->num_rows > 0) {
                            // E-mail não cadastrado, inserir na tabela
                            $sql = "INSERT INTO esquecisenha (email) VALUES ('$email')";

                            if ($conn->query($sql) === TRUE) {
                                echo "<br><div style='text-align:center; color:#3cab29;'>Código enviado com sucesso!<br> Em breve receberá a sua nova senha.</div>";
                            } else {
                                echo "<br><div style='text-align:center; color:#ba1c1c;'>Erro ao inserir o e-mail:</div>" . $conn->error;
                            }

                        } else {
                            echo "<br><div style='text-align:center; color:#ba1c1c;'>E-mail não cadastrado!</div>";
                        }

                        $conn->close();
                    }
                    ?>




            </form>

        </div>
</body>

<script src="./js/script_.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</html>