<?php
include_once('config.php');
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();
    

if ($res->num_rows > 0) {
    $usuario = $res->fetch_assoc();

    if (password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario'] = $usuario['nome'];
        $_SESSION['nivel'] = $usuario['nivel'];
        $_SESSION['id_usuario'] = $usuario['id']; // <- OK AQUI
        header('Location: perfil.php');
        exit();
    } else {
        $erro = "Email ou senha inválidos.";
    }
} else {
    $erro = "Email ou senha inválidos.";
}

}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Twilher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kalnia:wght@100..700&display=swap');

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
        }
    </style>
</head>

<body>
    <div class="fundo">
        <main class="formularioFundo">
            <h2>Login</h2>
            <?php if (!empty($erro)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div>
            <?php endif; ?>
            <form action="" method="POST" novalidate>
                <input type="email" name="email" class="form-control" placeholder="Email" required autofocus />
                <input type="password" name="senha" class="form-control" placeholder="Senha" required />
                <input type="submit" name="submit" value="Entrar" />
            </form>

            <div>
                <a href="cadastro.php" class="back-link">Registrar</a>
            </div>
        </main>
    </div>
</body>

</html>