<?php 
include "config.php";
session_start();

if(isset($_POST["enviar"])){
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $fazer = $conexao->prepare("INSERT INTO medicamentos (nome, tipo, descricao, preco) VALUES (?, ?, ?, ?)");

    $fazer->bind_param("sssd", $nome, $tipo, $descricao, $preco);

    if($fazer->execute()){
        echo "Medicamento Cadastrado";
        header("Location: listar_medicamentos.php");
        exit;
    } else {
        echo "Medicamento não Cadastrado";
    }

    $fazer->close();
}
?>

<!DOCTYPE html>
 <html lang="pt-br">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Cadastrar Medicamento - Biotech</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
 </head>
 <body>
     <?php include "header.php"; ?>
    
     <div class="container">

         <h3>Cadastrar Medicamento</h3>
         <form method="POST">
             <input type="text" name="nome" placeholder="Nome do Medicamento" required>
             <input type="text" name="tipo" placeholder="Tipo do Medicamento" required>
             <textarea name="descricao" placeholder="Descrição do Medicamento" rows="4" required></textarea>
             <input type="text" name="preco" placeholder="Preço R$" required>
             <button type="submit" name="enviar" class="btn blue">Cadastrar</button>
             <a href="listar_medicamentos.php" class="novoo">Voltar</a>
         </form>
     </div>

       <?php include "footer.php"; ?>
             
 </body>
 </html>



