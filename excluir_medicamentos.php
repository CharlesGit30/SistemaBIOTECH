<?php 
include "config.php";

$id = $_GET['id'];

$excluir = $conexao->prepare("DELETE FROM medicamentos WHERE id = ?");
$excluir->bind_param("i", $id);

if($excluir->execute()){
    header("Location: listar_medicamentos.php");
    exit;
} else {
    echo "Erro ao excluir medicamento!";
}

$excluir->close();
$conexao->close();
?>
