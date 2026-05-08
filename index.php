<?php include "config.php";
      include "protecao_login.php";
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
     <link rel="stylesheet" href="style.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

    <?php include "header.php"; ?>

  <div class="menu">
     <div class="banner-principal">
       <img src="./imagens/banner.png"></img>
     </div>
  </div>



  <div class="carrossel">
  <div class="logos">
    <a href="#"><img src="./imagens/logo1.png" alt="CECMED"></a>
    <a href="#"><img src="./imagens/logo2.webp" alt="CECMED"></a>
    <a href="#"><img src="./imagens/logo3.webp" alt="CECMED"></a>
    <a href="#"><img src="./imagens/logo4.webp" alt="CECMED"></a>
    <a href="#"><img src="./imagens/logo5.webp" alt="CECMED"></a>
    <a href="#"><img src="./imagens/logo1.png" alt="CECMED"></a>
    <a href="#"><img src="./imagens/logo2.webp" alt="CECMED"></a>
    <a href="#"><img src="./imagens/logo3.webp" alt="CECMED"></a>
    <a href="#"><img src="./imagens/logo4.webp" alt="CECMED"></a>
    <a href="#"><img src="./imagens/logo5.webp" alt="CECMED"></a>  <a href="#"><img src="./imagens/logo1.png" alt="CECMED"></a>
    <a href="#"><img src="./imagens/logo2.webp" alt="CECMED"></a>
    <a href="#"><img src="./imagens/logo3.webp" alt="CECMED"></a>
    <a href="#"><img src="./imagens/logo4.webp" alt="CECMED"></a>
    <a href="#"><img src="./imagens/logo5.webp" alt="CECMED"></a>
  </div>
</div>
    
  </div>

  <div class="caixas">
    <div class="caixa caixa1">
      <h2 class="titulo-caixa">Novo Laudo</h2>
      <p class="texto-caixa">Cadastre novos laudos de forma rápida e segura no sistema.</p>
      <a href="criar_laudo.php" class="btn btn-add">Novo Laudo</a>
    </div>

    <div class="caixa caixa2">
      <h2 class="titulo-caixa">Mostrar Laudos</h2>
      <p class="texto-caixa">Consulte, edite ou exclua todos os laudos já cadastrados.</p>
      <a href="listar_laudo.php" class="btn btn-add">Mostrar Laudos</a>
    </div>

    <div class="caixa caixa3">  
      <h2 class="titulo-caixa">Medicamentos</h2>
      <p class="texto-caixa">Gerencie o cadastro e a lista de medicamentos do sistema.</p>
      <a href="listar_medicamentos.php" class="btn btn-add">Medicamentos</a>
    </div>
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
