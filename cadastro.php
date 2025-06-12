<?php
include_once("config.php");
session_start();

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $senha = $_POST["senha"];
    $confirmar_senha = $_POST["confirmar_senha"];

    if (empty($nome) || empty($email) || empty($senha) || empty($confirmar_senha)) {
        $mensagem = "Preencha todos os campos.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensagem = "E-mail inválido.";
    } elseif ($senha !== $confirmar_senha) {
        $mensagem = "As senhas não coincidem.";
    } else {
        $sql = "SELECT id FROM usuarios WHERE email = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $mensagem = "E-mail já cadastrado.";
        } else {
            $hash = password_hash($senha, PASSWORD_DEFAULT);
            $nivel = "comum";
            $sql = "INSERT INTO usuarios (nome, email, senha, nivel) VALUES (?, ?, ?, ?)";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("ssss", $nome, $email, $hash, $nivel);

            if ($stmt->execute()) {
                header("Location: login.php");
                exit;
            } else {
                $mensagem = "Erro ao cadastrar: " . $conexao->error;
            }
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kalnia:wght@100..700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body,
        html {
            height: 100%;
            font-family: 'Kalnia', cursive;
            background-color: #E6E6E6;
        }

        .fundo {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .formularioFundo {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
            max-width: 400px;
            width: 90%;
        }

        h2 {
            font-weight: 500;
            font-size: 28px;
            margin-bottom: 25px;
            color: #000;
            text-align: center;
        }

        input.form-control {
            font-family: 'Kalnia', cursive;
            font-size: 18px;
            margin-bottom: 20px;
            height: 45px;
            width: 100%;
            padding: 0 10px;
        }

        input[type="submit"] {
            background: linear-gradient(45deg, #FFA500, #FF7F50);
            border: none;
            color: white;
            font-family: 'Kalnia', cursive;
            font-weight: 600;
            font-size: 18px;
            padding: 12px 0;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background: linear-gradient(45deg, #FFB347, #FF6F61);
        }

        .alert-danger {
            font-family: 'Kalnia', cursive;
            font-weight: 500;
            font-size: 16px;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 6px;
            background-color: #f8d7da;
            color: #842029;
            border: 1px solid #f5c2c7;
        }
    </style>
</head>

<body class="fundo">
    <form method="POST" action="" class="formularioFundo" novalidate>
        <h2>Cadastro</h2>

        <?php if ($mensagem): ?>
            <div class="alert-danger"><?= htmlspecialchars($mensagem) ?></div>
        <?php endif; ?>

        <input type="text" name="nome" placeholder="Nome" required class="form-control"
            value="<?= isset($nome) ? htmlspecialchars($nome) : '' ?>">
        <input type="email" name="email" placeholder="Email" required class="form-control"
            value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">
        <input type="password" name="senha" placeholder="Senha" required class="form-control">
        <input type="password" name="confirmar_senha" placeholder="Confirmar Senha" required class="form-control">
        <input type="submit" value="Cadastrar">
        
        <div>
            <a href="login.php" class="back-link">Entrar</a>
        </div>
    </form>
</body>

</html>