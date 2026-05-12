<?php
session_start();
include "config.php";


if (isset($_POST["enviar"])) {

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $buscar = $conexao->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ?");
    $buscar->bind_param("s", $email);
    $buscar->execute();

    $resultado = $buscar->get_result();
    $dados = $resultado->fetch_assoc();

    if ($dados && password_verify($senha, $dados["senha"])) {

        $_SESSION["logado"] = true;
        $_SESSION["nome"] = $dados["nome"];

        header("Location: index.php");
        exit;

    } else {
        echo "E-mail ou senha incorretos!";
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
            <input type="email" name="email" required>
        </div>
        <div class="form-dados">
            <label>Senha:</label>
            <input type="password" name="senha" required>
        </div>
        <button type="submit" name="enviar">Entrar no Sistema</button><br><br>
        <a href="definir_senha.php" class="cadastro-adm">Cadastrar Profissional</a>
    </form>
</div>

<?php include "footer.php" ?>

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