
<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php');
    exit();
}

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'twilher tcc';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

// Buscar publicações da comunidade
$sql = "SELECT id, id_usuario, titulo, conteudo, data_publicacao FROM publicacoes ORDER BY data_publicacao DESC";
$result = $conexao->query($sql);
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

<body class="fundo m-0 border-0 bd-example-cssgrid">

    <header>
        <a href="index.html"><img class="logo" src="assets/img/colherIcon.png" alt="logo"></a>
        <div class="nav_links">
            <a href="index.html">Home</a>
            <a href="receitas.php">Receitas</a>
            <a href="exibirPublicacao.php">Comunidade</a>
        </div>
        <a class="perfilnav" href="perfil.php">Perfil</a>
    </header>

    <div>
        <h1 class="text-center home">Comunidade</h1>
        <p class="text-center texto">Chat geral</p>
    </div>

    <div>
        <button class="botaoComu" onclick="abrirNovaAbaComu()">+</button>
        <button class="botaoCriar" onclick="abrirNovaAba()">CRIAR</button>
    </div>

    <div class="feed-container">
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $eh_dono = ($_SESSION['id_usuario'] == $row['id_usuario']);

                echo "<div class='publicacao'>";
                echo "<h2>Usuário #" . htmlspecialchars($row['id_usuario']) . " — " . htmlspecialchars($row['titulo']) . "</h2>";
                echo "<p>" . nl2br(htmlspecialchars($row['conteudo'])) . "</p>";
                echo "<small>Publicado em: " . htmlspecialchars($row['data_publicacao']) . "</small>";

                if ($eh_dono) {
                    echo "<form method='POST' action='excluirReceita.php' onsubmit='return confirm(\"Tem certeza que deseja excluir esta publicação?\");'>";
                    echo "<input type='hidden' name='id_receita' value='" . $row['id'] . "'>";
                    echo "<button type='submit' class='btn btn-danger mt-2'>Excluir</button>";
                    echo "</form>";
                }

                echo "</div>";
            }
        } else {
            echo "<p class='nenhuma-publicacao'>Nenhuma publicação encontrada.</p>";
        }
        ?>
    </div>

    <footer class="rodape">
        <p><img src="assets/img/colherIcon.png" alt="colher" width="200px"></p>
        <p>Todos os direitos reservados</p>
        <p>Desenvolvido por: Arthur Ido -- André Yuki -- Antony Schimit</p>
        <p style="font-family: monospace;">Data: 14/03</p>
        <p style="font-family: monospace;">Versão: Beta</p>
    </footer>

    <script src="assets/js/botaoCriar.js"></script>
    <script src="assets/js/botaoComu.js"></script>
</body>
</html>

<?php
$conexao->close();
?>

