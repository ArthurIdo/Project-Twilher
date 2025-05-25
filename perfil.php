<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
?>

<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'twilher tcc';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/navbarStyle.css">
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

    <section>
        <div class="perfil">
            <img src="assets/img/user.png" alt="foto de perfil">
            <p>Arthur Ido</p>
        </div>
        
        <div class="sobreMim">
            <h1>Sobre mim</h1>
            <p>Olá, sou Arthur Ido, tenho 20 anos e sou estudante de Ciência da Computação. Gosto de cozinhar e
                compartilhar minhas receitas com vocês.</p>

        </div>
    </section>

    <section>
        <div class="tituloMinhasReceitas">
            <h2>Minhas Receitas</h2>
        </div>

        <div class="container">
            <button onclick="abrirNovaAba()" class="receita">
                <div class="imagem"><img src="assets/img/criar.png" width="100%"></div>
                <div class="conteudo">
                    <div class="titulo">Criar uma nova receita</div>
                    <div class="descricao">Clique aqui para criar uma nova receita</div>
                </div>
            </button>

            <?php
$sql = "SELECT id, nome, pais_origem, modo_preparo, tempo_preparo, imagem, data_envio FROM receitas";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $imagemPath = "uploads/" . htmlspecialchars($row['imagem']);
        $imagem = file_exists($imagemPath) ? $imagemPath : "placeholder.jpg";
        
        echo "<a href='detalhes.php?id=" . $row['id'] . "' class='receita'>";
        echo "    <div class='imagem'><img src='" . $imagem . "' alt='" . htmlspecialchars($row['nome']) . "'></div>";
        echo "    <div class='conteudo'>";
        echo "        <div class='titulo'>" . htmlspecialchars($row['nome']) . "</div>";
        echo "        <div class='descricao'>" . htmlspecialchars($row['pais_origem']) . "</div>";
        echo "    </div>";
        echo "</a>";
    }
} else {
    echo "<p style='text-align:center; font-family: Arial;'>Nenhuma receita encontrada.</p>";
}
?>


            <!-- <a href="" class="receita">
                <div class="imagem">Foto</div>
                <div class="conteudo">
                    <div class="titulo">Nome da Receita</div>
                    <div class="descricao">Uma breve descrição da receita.</div>
                </div>
            </a> -->
        </div>
    
    </section>
        <br>    <!-- espaço em branco -->

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