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
 <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.min.css"> 
</head>
<body>

    <?php include "header.php"; ?>
<br>

<div class="banner">
    <img src="./imagens/banner1.png" alt="Banner">
</div>



</div>
<br>


<div class="logos">
      <div class="logos-slide">
        <img src="./imagens/logo1.png" />
        <img src="./imagens/logo2.webp" />
        <img src="./imagens/logo3.webp" />
        <img src="./imagens/logo4.webp" />
        <img src="./imagens/logo5.webp" />
      </div>

      <div class="logos-slide">
        <img src="./imagens/logo1.png" />
        <img src="./imagens/logo2.webp" />
        <img src="./imagens/logo3.webp" />
        <img src="./imagens/logo4.webp" />
        <img src="./imagens/logo5.webp" />
      </div>
    </div>
    
  </div>

  <div class="caixas">
    <div class="caixa caixa1">
      <h2 class="titulo-caixa">Novo Laudo</h2>
      <a href="criar_laudo.php" class="botao-redirecionar">Novo Laudo</a>
    </div>

    <div class="caixa caixa2">
      <h2 class="titulo-caixa">Mostrar Laudos</h2>
      <a href="listar_laudo.php" class="botao-redirecionar">Mostrar Laudos</a>
    </div>
</div>

<br><br><br><br><br>

<div class="ajuda">
    <video src="./imagens/video.mp4" loop autoplay controls></video>
</div>


   <?php include "footer.php" ?>


<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
    <div class="vw-plugin-top-wrapper"></div>
    </div>
</div>
<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
<script>new window.VLibras.Widget('https://vlibras.gov.br/app');</script>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.3.8/js/dataTables.min.js"></script>
</body>
</html>
