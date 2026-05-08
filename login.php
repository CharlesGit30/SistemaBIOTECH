<?php
session_start();
include "config.php";

$erro = "";


if (isset($_POST["enviar"])) {

    $email = trim($_POST["email"]);
    $senha = $_POST["senha"];


    $buscar = $conexao->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ?");
    $buscar->bind_param("s", $email);
    $buscar->execute();
    $resultado = $buscar->get_result();

    if ($resultado->num_rows === 1) {
        $dados = $resultado->fetch_assoc();


        if (password_verify($senha, $dados["senha"])) {


            if ($email === "biotech789@gmail.com") {
                $_SESSION["logado"] = true;
                $_SESSION["nome"]   = $dados["nome"];
                header("Location: index.php");
                exit;
            } else {
                $erro = "Acesso permitido apenas para o Administrador!";
            }

        } else {
            $erro = "Senha incorreta!";
        }
    } else {
        $erro = "E-mail não cadastrado!";
    }

    $buscar->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Biotech</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

<?php include "header.php" ?>
<br>
<div class="container">
    <h2 class="titulo_novolaudo">Login - Biotech</h2>

    <form method="POST">
        <div class="form-dados">
            <label>E-mail:</label>
            <input type="email" name="email" placeholder="biotech789@gmail.com" value="biotech789@gmail.com" required>
        </div>
        <div class="form-dados">
            <label>Senha:</label>
            <input type="password" name="senha" placeholder="123456" required>
        </div>
        <button type="submit" name="enviar">Entrar no Sistema</button>
    </form>
</div>


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

</body>
</html>