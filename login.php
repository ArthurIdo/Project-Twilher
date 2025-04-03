<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/navbarStyle.css">
    <link rel="shortcut icon" href="assets/img/colherFavicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</head>

<body class="fundo">
    <section>

        <div class="fundo">
            <div class="login">
                <p>LOGIN</p>
            </div>

            <div class="credenciais">
                <form action="registroLogin.php" method="POST">

                <div class="p-4">
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>

                <div class="p-4">
                    <input type="password" id="senha" name="senha" placeholder="Senha" required>
                </div>

                <div>
                <input class="botaoLogin" type="submit" name="submit" value="Enviar">
            </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>