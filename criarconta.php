<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/custom.scss">

    <script>
        /* Máscaras ER */
        function mascara(o, f) {
            v_obj = o
            v_fun = f
            setTimeout("execmascara()", 1)
        }
        function execmascara() {
            v_obj.value = v_fun(v_obj.value)
        }
        function mtel(v) {
            v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
            v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
            v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
            return v;
        }
        function id(el) {
            return document.getElementById(el);
        }
        window.onload = function () {
            id('telefone').onkeyup = function () {
                mascara(this, mtel);
            }
        }
    </script>
</head>

<body>
    <div class="background">
        <div class="container p-5">
            <form method="post" action=""
                class="form shadow position-absolute top-50 start-50 translate-middle rounded-4">

                <h2>Cadastre-se</h2>

                <div class="flex-column">
                    <label>Nome</label>
                </div>
                <div class="inputForm"><i class="bi bi-person"></i>
                    <input type="text" id="nome" for="nome" class="input" name="nome" placeholder="Digite seu nome"
                        required>
                </div>
                <div class="flex-column">
                    <label>Email</label>
                </div>
                <div class="inputForm"><i class="bi bi-envelope"></i>
                    <input type="email" id="email" class="input" name="email" placeholder="E-mail" required>
                </div>
                <div class="flex-column">
                    <label>Telefone</label>
                </div>
                <div class="inputForm"><i class="bi bi-telephone"></i>
                    <input type="text" id="telefone" class="input" name="telefone" placeholder="Telefone" maxlength="15"
                        required>
                </div>

                <div class="flex-column">
                    <label>Senha</label>
                </div>
                <div class="inputForm">
                    <i class="bi bi-lock"></i>
                    <input type="password" id="senhaInput" name="senha" class="input" placeholder="Digite sua senha"
                        required>
                </div>

                <div class="flex-column">
                    <label>Confirme a senha</label>
                </div>
                <div class="inputForm">
                    <i class="bi bi-lock"></i>
                    <input type="password" id="confirmSenhaInput" name="confirmSenha" class="input"
                        placeholder="Confirme sua senha">
                </div>

                <button class="button-submit">Cadastrar</button>

                <p class="p">Ja possui conta? <span class="span"><a href="index">Login</a></span>

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


                    // Verifica se o formulário foi enviado
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $nome = $_POST['nome'];
                        $email = $_POST['email'];
                        $telefone = $_POST['telefone'];
                        $senha = $_POST['senha'];
                        $confirmSenha = $_POST['confirmSenha'];

                        // Verifica se a senha e a confirmação da senha são iguais
                        if ($senha != $confirmSenha) {
                            echo "<br><div style='text-align:center; color:#ba1c1c;'>As senhas não coincidem.</div>";
                            exit;
                        }

                        // Verifica se o e-mail já está cadastrado
                        $sql_check_email = "SELECT * FROM usuarios WHERE email = '$email'";
                        $result_check_email = $conn->query($sql_check_email);

                        if ($result_check_email->num_rows > 0) {
                            echo "<br><div style='text-align:center; color:#ba1c1c;'>Este e-mail já está cadastrado.</div>";
                            exit;
                        }

                        // Insere os dados no banco de dados
                        $sql_insert = "INSERT INTO usuarios (nome, email, telefone, senha) VALUES ('$nome', '$email', '$telefone', '$senha')";

                        if ($conn->query($sql_insert) === TRUE) {
                            echo "<br><div style='text-align:center; color:#3cab29;'>Cadastro realizado com sucesso.</div>";

                        } else {
                            echo "<br><div style='text-align:center; color:#ba1c1c;'>Erro ao cadastrar:</div>" . $conn->error;
                        }

                        $conn->close();
                    }
                    ?>

            </form>
        </div>

    </div>
</body>

<script src="./js/script_.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</html>