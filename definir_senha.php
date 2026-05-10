<?php
include "config.php";


if (isset($_POST['cadastrar'])) {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    $cadastrar = $conexao->prepare("SELECT id FROM usuarios WHERE email = ?");
    $cadastrar->bind_param("s", $email);
    $cadastrar->execute();
    $cadastrar->store_result();

    if ($cadastrar->num_rows > 0) {
        echo "E-mail já cadastrado!";
    } else {

        $cadastrar = $conexao->prepare(
            "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)"
        );

        $cadastrar->bind_param("sss", $nome, $email, $senha);

        if ($cadastrar->execute()) {
            header("Location: login.php");
            exit;
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar!";
        }
    }

    $cadastrar->close();
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do Profissional</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include "header.php" ?>

<div class="container">
<h2 class="titulo_novolaudo">Cadastrar Profissional</h2>
<form method="POST">
    <input type="text" name="nome" placeholder="Nome" required><br><br>
    <input type="email" name="email" placeholder="E-mail" required><br><br>
    <input type="password" name="senha" placeholder="Senha" required><br><br>
    <button type="submit" name="cadastrar">Cadastrar</button>
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

