<?php

    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "twilher tcc";


    $conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

    // Buscar as publicações
    $sql = "SELECT id, titulo, conteudo, data_publicacao FROM publicacoes ORDER BY data_publicacao DESC";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/colherFavicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>
<body class="fundo p-3 m-0 border-0 bd-example m-0 border-0 bd-example-cssgrid">
        <!-- INICIO NAVBAR -->
        <header>
        <a href="index.html"><img class="logo" src="assets/img/colherIcon.png" alt="logo"></a>

        <div class="nav_links">
            <a href="index.html">Home</a>
            <a href="receitas.html">Receitas</a>
            <a href="exibirPublicacao.php">Comunidade </a>
        </div>

        <a class="perfilnav" href="perfil.php">Perfil</a>
        <!-- FIM NAVBAR -->
    </header>

    
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='publicacao'>";
            echo "<h2>" . htmlspecialchars($row['titulo']) . "</h2>";
            echo "<p>" . nl2br(htmlspecialchars($row['conteudo'])) . "</p>";
            echo "<small>Publicado em: " . $row['data_publicacao'] . "</small>";
            echo "</div>";
        }
    } else {
        echo "<p>Nenhuma publicação encontrada.</p>";
    }
    ?>

</body>
</html>

<?php
    $conn->close();
?>
