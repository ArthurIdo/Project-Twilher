<?php
include_once('config.php');
session_start();
if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $nivel = 'comum';

    $sql = "INSERT INTO usuarios (nome, email, senha, nivel) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssss", $nome, $email, $senha, $nivel);
    $stmt->execute();
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Registrar</h2>
    <form action="" method="POST">
        <div class="mb-3"><input type="text" name="nome" class="form-control" placeholder="Nome" required></div>
        <div class="mb-3"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
        <div class="mb-3"><input type="password" name="senha" class="form-control" placeholder="Senha" required></div>
        <input type="submit" name="submit" class="btn btn-primary" value="Registrar">
    </form>
</body>
</html>
