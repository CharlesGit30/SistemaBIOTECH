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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css"></head>

<body>

<div vw class="enabled">
    <div vw-access-button class="active"></div>

    <div vw-plugin-wrapper>
        <div class="vw-plugin-top-wrapper"></div>
    </div>
</div>

<?php include "header.php"; ?>

<div class="container">
    <a href="criar_laudo.php" class="novo">Novo Laudo</a>
    <h2>Laudos Registrados</h2>

    <table id="tabela1" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>CPF</th>
                <th>Médico</th>
                <th>Data</th>
                <th>CID</th>
                <th>Diagnostico</th>
                <th>Recomendações</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
        <?php if ($consultar->num_rows > 0): ?>
            <?php while($row = $consultar->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']?></td>
                    <td><?= $row['pac_nome']?></td>
                    <td><?= $row['pac_cpf']?></td>
                    <td><?= $row['med_nome']?></td>
                    <td><?= $row['data_atend']?></td>
                    <td><?= $row['cid']?></td>
                    <td><?= $row['conteudo_laudo']?></td>
                    <td><?= $row['prescricao']?></td>
                    <td class="acoes"><a class="botao-editar" href="editar_laudo.php?id=<?= $row['id'] ?>">Editar</a>
                        <a class="botao-inoperar" href="excluir_laudo.php?id=<?= $row['id'] ?>">Inativar</a>

</td>
            <?php endwhile; ?>
        <?php endif; ?>
        </tbody>
    </table>
    </div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="script.js"></script>

<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
<script>new window.VLibras.Widget('https://vlibras.gov.br/app');</script>
<script src="script.js"></script>
</body>
</html>

<?php $conexao->close(); ?>