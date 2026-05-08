<?php 
        include "protecao_login.php";
      include "config.php";
      $consultar = $conexao->query("SELECT * FROM laudos ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Laudos Cadastrados</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

<?php include "header.php" ?>

<div class="container">
    <a href="criar_laudo.php" class="btn btn-add">Novo Laudo</a>
    <h2>Laudos Registrados</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>CPF</th>
                <th>Médico</th>
                <th>Data</th>
                <th>CID</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
          
            <?php
            if ($consultar->num_rows > 0) {
                while($row = $consultar->fetch_assoc()) {
                    
                    $dataBR = date('d/m/Y', strtotime($row['data_atend']));
                    
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['pac_nome'] . "</td>";
                    echo "<td>" . $row['pac_cpf'] . "</td>";
                    echo "<td>" . $row['med_nome'] . "</td>";
                    echo "<td>" . $dataBR . "</td>";
                    echo "<td>" . $row['cid'] . "</td>";
                    echo "<td>
                            <a href='editar_laudo.php?id=" . $row['id'] . "' class='btn btn-edit'>Editar</a>
                            <a href='excluir_laudo.php?id=" . $row['id'] . "' class='btn btn-del' onclick='return confirm(\"Tem certeza?\")'>Inoperar</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7' style='text-align:center;'>Nenhum laudo encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
<?php $conexao->close(); ?>