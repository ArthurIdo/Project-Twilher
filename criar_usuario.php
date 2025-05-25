<?php
include_once('config.php');

$nome = 'Usuario Teste';
$email = 'usuario@teste.com';
$senha = password_hash('usuario123', PASSWORD_DEFAULT);
$nivel = 'comum';

$sql = "INSERT INTO usuarios (nome, email, senha, nivel) VALUES (?, ?, ?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ssss", $nome, $email, $senha, $nivel);

if ($stmt->execute()) {
    echo "Usuário criado com sucesso.";
} else {
    echo "Erro ao criar usuário: " . $conexao->error;
}
?>
