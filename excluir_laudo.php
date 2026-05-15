<?php

 include "config.php";

 $id = (int)$_GET['id'];

 $excluir = $conexao->prepare("DELETE FROM laudos   WHERE id = ?");

 $excluir->bind_param("i", $id);

     if($excluir->execute()){
     header("Location: listar_laudo.php");
     exit;
 } else {
     echo "Erro ao excluir registro!";
 }
 ?>