<?php
    include "protecao_login.php";
    include "config.php";

  if(isset($_POST["enviar"])){

    $pac_nome        = $_POST["pac_nome"];
    $pac_cpf         = $_POST["pac_cpf"];
    $pac_nasc        = $_POST["pac_nasc"];
    $med_nome        = $_POST["med_nome"];
    $med_crm         = $_POST["med_crm"];
    $data_atend      = $_POST["data_atend"];
    $cid             = $_POST["cid"];
    $conteudo_laudo  = $_POST["conteudo_laudo"]; 
    $prescricao      = $_POST["prescricao"];

    $fazer = $conexao->prepare("INSERT INTO laudos (pac_nome, pac_cpf, pac_nasc, med_nome, med_crm, data_atend, cid, conteudo_laudo, prescricao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if($fazer){
        $fazer->bind_param("sssssssss", $pac_nome, $pac_cpf, $pac_nasc, $med_nome, $med_crm, $data_atend, $cid, $conteudo_laudo, $prescricao);

        if($fazer->execute()){
          header("Location: listar_laudo.php");
          exit;
        } else {
          echo "Erro ao executar: " . $fazer->error;
        }
        $fazer->close();
        $conexao->close();
  }}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Laudo Médico</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
  <?php include "header.php" ?>

  
<div class="container">
    

    
<form method="POST">
<h2 class="titulo_novolaudo">Novo Laudo Médico</h2>
        
        <h3>Dados do Paciente</h3>
        <div class="form-dados">
            <label>Nome Completo:</label>
            <input type="text" name="pac_nome" required placeholder="Seu Nome Completo">
        </div>
        
        <div class="row">
            <div class="form-dados">
                <label>CPF:</label>
                <input type="text" name="pac_cpf" placeholder="000.000.000-00">
            </div>
            <div class="form-dados">
                <label>Data de Nascimento:</label>
                <input type="date" name="pac_nasc">
            </div>
        </div>

        <h3>Dados do Médico</h3>
        <div class="row">
            <div class="form-dados">
                <label>Nome do Médico:</label>
                <input type="text" name="med_nome" required placeholder="Nome do Médico">
            </div>
            <div class="form-dados">
                <label>CRM/UF:</label>
                <input type="text" name="med_crm" required placeholder="00000/SP">
            </div>
        </div>

        <h3>Informações Clínicas</h3>
        <div class="row">
            <div class="form-dados">
                <label>Data do Atendimento:</label>
                <input type="date" name="data_atend" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="form-dados">
                <label>CID-10:</label>
                <input type="text" name="cid" placeholder="Ex: M54.5">
            </div>
        </div>

        <div class="form-dados">
            
            <textarea name="conteudo_laudo" placeholder="Seu Diagnostico"></textarea>
        </div>

        <div class="form-dados">
            <textarea name="prescricao" placeholder="Sua Recomendação"></textarea>
        </div><br>

        <button type="submit" name="enviar">Salvar Laudo</button>
    </form>
</div>

</body>
</html>

