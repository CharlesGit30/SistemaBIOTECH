<?php
include "config.php";

$id = $_GET['id'];
$editar = $conexao->query("SELECT * FROM laudos WHERE id=$id")->fetch_assoc();

if(isset($_POST["enviar"])) {
    $atualizar = $conexao->prepare("UPDATE laudos SET 
        pac_nome=?, pac_cpf=?, pac_nasc=?, med_nome=?, med_crm=?, 
        data_atend=?, cid=?, conteudo_laudo=?, prescricao=? 
        WHERE id=?");
    
    $atualizar->bind_param("sssssssssi",
        $_POST['pac_nome'],
        $_POST['pac_cpf'],
        $_POST['pac_nasc'],
        $_POST['med_nome'],
        $_POST['med_crm'],
        $_POST['data_atend'],
        $_POST['cid'],
        $_POST['conteudo_laudo'],
        $_POST['prescricao'],
        $id
    );

    if($atualizar->execute()){
        header("Location: listar.php");
        exit;
    } else {
      echo "Falha ao atualizar: " . $conexao->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Laudo Médico</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
<?php include "header.php" ?>

<div class="container">
    <h2 class="titulo_novolaudo">Editar Laudo - ID: <?php echo $editar['id']; ?></h2>
    <form method="POST">
        <h3>Dados do Paciente</h3>
        <div class="form-dados">
            <label>Nome Completo:</label>
            <input type="text" name="pac_nome" value="<?php echo $editar['pac_nome']; ?>" required>
        </div>

        <div class="row">
            <div class="form-dados">
                <label>CPF:</label>
                <input type="text" name="pac_cpf" value="<?php echo $editar['pac_cpf']; ?>">
            </div>
            <div class="form-dados">
                <label>Data de Nascimento:</label>
                <input type="date" name="pac_nasc" value="<?php echo $editar['pac_nasc']; ?>">
            </div>
        </div>

        <h3>Dados do Médico</h3>
        <div class="row">
            <div class="form-dados">
                <label>Nome do Médico:</label>
                <input type="text" name="med_nome" value="<?php echo $editar['med_nome']; ?>" required>
            </div>
            <div class="form-dados">
                <label>CRM/UF:</label>
                <input type="text" name="med_crm" value="<?php echo $editar['med_crm']; ?>" required>
            </div>
        </div>

        <h3>Informações Clínicas</h3>
        <div class="row">
            <div class="form-dados">
                <label>Data do Atendimento:</label>
                <input type="date" name="data_atend" value="<?php echo $editar['data_atend']; ?>">
            </div>
            <div class="form-dados">
                <label>CID-10:</label>
                <input type="text" name="cid" value="<?php echo $editar['cid']; ?>">
            </div>
        </div>

        <div class="form-dados">
            <label>Conteúdo do Laudo:</label>
            <textarea name="conteudo_laudo" rows="5"><?php echo $editar['conteudo_laudo']; ?></textarea>
        </div>

        <div class="form-dados">
            <label>Prescrição/Recomendações:</label>
            <textarea name="prescricao" rows="5"><?php echo $editar['prescricao']; ?></textarea>
        </div>

        <button type="submit" name="enviar">Salvar Alterações</button>
        <a href="listar.php" class="btn btn-voltar">Voltar para Lista</a>
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