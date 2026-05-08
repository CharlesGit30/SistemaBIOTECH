<?php
include "config.php";

// Dados do administrador
$nome = "Administrador";
$email = "biotech789@gmail.com";
$senha = "123456"; // Você pode trocar por qualquer senha que quiser

// Criptografa a senha do jeito exato que o PHP reconhece
$senhaCripto = password_hash($senha, PASSWORD_DEFAULT);

// Verifica se o usuário já existe
$verificar = $conexao->prepare("SELECT id FROM usuarios WHERE email = ?");
$verificar->bind_param("s", $email);
$verificar->execute();
$verificar->store_result();

if ($verificar->num_rows > 0) {
    // Atualiza se já existir
    $atualizar = $conexao->prepare("UPDATE usuarios SET nome=?, senha=? WHERE email=?");
    $atualizar->bind_param("sss", $nome, $senhaCripto, $email);
    if ($atualizar->execute()) {
        echo "✅ Senha definida com sucesso!<br>";
        echo "📧 E-mail: biotech789@gmail.com<br>";
        echo "🔑 Senha: 123456<br><br>";
        echo "<a href='login.php'>Ir para o login</a>";
    } else {
        echo "❌ Erro: " . $conexao->error;
    }
    $atualizar->close();
} else {
    // Cria o usuário se não existir
    $cadastrar = $conexao->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
    $cadastrar->bind_param("sss", $nome, $email, $senhaCripto);
    if ($cadastrar->execute()) {
        echo "✅ Usuário e senha criados com sucesso!<br>";
        echo "📧 E-mail: biotech789@gmail.com<br>";
        echo "🔑 Senha: 123456<br><br>";
        echo "<a href='login.php'>Ir para o login</a>";
    } else {
        echo "❌ Erro: " . $conexao->error;
    }
    $cadastrar->close();
}

$verificar->close();
$conexao->close();
?>