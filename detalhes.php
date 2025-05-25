<?php
// conexão com o banco
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'twilher tcc';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

// verificar se id foi passado
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID inválido.");
}

$id = intval($_GET['id']);

// busca receita
$sql = "SELECT nome, pais_origem, modo_preparo, tempo_preparo, imagem FROM receitas WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<p>Receita não encontrada.</p>";
    exit;
}

$receita = $result->fetch_assoc();
$stmt->close();
$conexao->close();
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
    <div class="detalhes-receita">
        <div class="imagem-detalhes">
            <img src="uploads/<?php echo htmlspecialchars($receita['imagem']); ?>" alt="<?php echo htmlspecialchars($receita['nome']); ?>">
        </div>

        <h1><?php echo htmlspecialchars($receita['nome']); ?></h1>
        <p><strong>País de origem:</strong> <?php echo htmlspecialchars($receita['pais_origem']); ?></p>
        <p><strong>Tempo de preparo:</strong> <?php echo htmlspecialchars($receita['tempo_preparo']); ?></p>
        <p><strong>Passo a passo:</strong><br><?php echo nl2br(htmlspecialchars($receita['modo_preparo'])); ?></p>

        <a href="receitas.php" class="back-link">← Voltar Receitas</a>
        <br>
        <a href="perfil.php" class="back-link">← Voltar Perfil</a>
        <br>
        <a href="index.html" class="back-link">← Voltar Home</a>
    </div>
<br>
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

