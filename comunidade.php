<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comunidade</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/colherFavicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>

<body class="fundo m-0 border-0 bd-example m-0 border-0 bd-example-cssgrid">

    <!-- INICIO NAVBAR -->
    <header>
        <a href="index.html"><img class="logo" src="assets/img/colherIcon.png" alt="logo"></a>

        <div class="nav_links">
            <a href="index.html">Home</a>
            <a href="receitas.php">Receitas</a>
            <a href="exibirPublicacao.php">Comunidade </a>
        </div>

        <a class="perfilnav" href="perfil.php">Perfil</a>
        <!-- FIM NAVBAR -->
    </header>
<br>
    <div class="formularioFundo">
    <div class="home">
        <p>ENVIE UM COMENTARIO</p>
    </div>

    <form action="publicar.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="titulo" class="form-label">Titulo: </label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>

        <div class="mb-3">
            <label for="conteudo" class="form-label">Conteúdo: </label>
            <textarea class="form-control" id="conteudo" name="conteudo" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Publicar</button>
    </form>
</div>


    <!-- <h1>Publicar Artigo</h1>
    <form action="publicar.php" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="conteudo">Conteúdo:</label><br>
        <textarea id="conteudo" name="conteudo" rows="6" cols="40" required></textarea><br><br>

        <input type="submit" value="Publicar">
    </form> -->


        <div>
            <button class="botaoCriar" onclick="abrirNovaAba()">CRIAR</button>
        </div>

<br>
    <footer class="rodape">
        <p><img src="assets/img/colherIcon.png" alt="colher" width="200px"></p>
        <p>Todos os direitos reservados</p>
        <p>Desenvolvido por: Arthur Ido -- André Yuki -- Antony Schimit<a href=""></a></p>
        <p style="font-family: monospace;">Data: 14/03</p>
        <p style="font-family: monospace;">Versão: Beta</p>
    </footer>


    <script src="assets/js/botaoCriar.js"></script>
</body>
</html>