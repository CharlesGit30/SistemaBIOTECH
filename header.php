<?php   
if (isset($_SESSION["logado"]) && $_SESSION["logado"]) {
    $logado = true;
    $nomeUsuario = $_SESSION["nome"];
} else {
    $logado = false;
    $nomeUsuario = "";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Laudos</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

<header>

    <div class="logo">
    <a href="index.php"><img src="logo.jpg" alt="Foto da Logo"></a>
    </div>

    <?php if ($logado): ?>
        <div class="navbar">
            <a href="listar_laudo.php">Listar Laudos</a>
            <a href="criar_laudo.php">Novo Laudo</a>
        </div>
    <?php endif; ?>

    <div class="icones">
        <?php if ($logado): ?>
            <span><?= $nomeUsuario ?></span>
            <a href="sair.php" title="Sair do sistema">
            <i class='bx bx-exit'></i>
            </a>
        <?php else: ?>
            <a href="login.php" title="Fazer Login">
                <i class='bx bx-user'></i>
            </a>
        <?php endif; ?>

    </div>

</header>