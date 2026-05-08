<?php 
include "config.php";

$id = $_GET['id'];
$dados = $conexao->query("SELECT * FROM medicamentos WHERE id=$id")->fetch_assoc();

if(isset($_POST["enviar"])){
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $atualizar = $conexao->prepare("UPDATE medicamentos SET nome=?, tipo=?, descricao=?, preco=? WHERE id=?");
    $atualizar->bind_param("sssdi", $nome, $tipo, $descricao, $preco, $id);

    if($atualizar->execute()){
        header("Location: listar_medicamentos.php");
        exit;
    } else {
        echo "Erro ao atualizar!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Medicamento</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

    <?php include "header.php" ?>

<div class="container">
    <h2>Editar Medicamento</h2>
  
    <form method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $dados['nome']; ?>" required>

        <label>Tipo:</label>
        <input type="text" name="tipo" value="<?php echo $dados['tipo']; ?>" required>

        <label>Descrição:</label>
        <textarea name="descricao" required><?php echo $dados['descricao']; ?></textarea>

        <label>Preço:</label>
        <input type="text" name="preco" value="<?php echo $dados['preco']; ?>" required>

        <button type="submit" name="enviar">Salvar Alterações</button>
        <a href="listar_medicamentos.php" class="novoo">Voltar</a>
    </form>
</div>

</body>
</html>
