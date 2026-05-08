<?php 
include "config.php";
include "protecao_login.php";

$resultado = $conexao->query("SELECT * FROM medicamentos ORDER BY nome DESC");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Medicamentos Cadastrados</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

    <?php include "header.php" ?>

<div class="container">
    <a href="criar_medicamentos.php" class="novo">Novo Medicamento</a>
    <h2>Medicamentos Registrados</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($resultado->num_rows > 0) {
                while($row = $resultado->fetch_assoc()) {
                    
                    $precoBR = number_format($row['preco'], 2, ',', '.');
                    
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nome'] . "</td>";
                    echo "<td>" . $row['tipo'] . "</td>";
                    echo "<td>" . $row['descricao'] . "</td>";
                    echo "<td>R$ " . $precoBR . "</td>";
                    echo "<td>
                            <a href='editar_medicamentos.php?id=" . $row['id'] . "' class='btn btn-edit'>Editar</a>
                            <a href='excluir_medicamentos.php?id=" . $row['id'] . "' class='btn btn-del' onclick='return confirm(\"Tem certeza?\")'>Excluir</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhum Medicamento Encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php $conexao->close(); ?>
