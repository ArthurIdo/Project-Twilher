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

$id_usuario = $_SESSION['id_usuario']; // <- Captura o ID do usuário logado
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>

<body class="fundo m-0 border-0 bd-example m-0 border-0 bd-example-cssgrid">
<header>
    <a href="index.html"><img class="logo" src="assets/img/colherIcon.png" alt="logo"></a>
    <div class="nav_links">
        <a href="index.html">Home</a>
        <a href="receitas.php">Receitas</a>
        <a href="exibirPublicacao.php">Comunidade</a>
    </div>
    <a class="perfilnav" href="perfil.php">Perfil</a>
</header>

<section>
    <div class="perfil">
        <img src="assets/img/user.png" alt="foto de perfil">
        <p><?= htmlspecialchars($_SESSION['usuario']) ?></p>
    </div>

    <div class="sobreMim">
        <h1>Sobre mim</h1>
        <p>Olá, sou <?= htmlspecialchars($_SESSION['usuario']) ?>. Adoro cozinhar e compartilhar minhas receitas com vocês.</p>
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
        $sql = "SELECT id, nome, pais_origem, modo_preparo, tempo_preparo, imagem, data_envio 
                FROM receitas WHERE id_usuario = ?";
        $stmt = $conexao->prepare($sql);

        if (!$stmt) {
            die("Erro ao preparar a consulta: " . $conexao->error);
        }

        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $imagemPath = "uploads/" . htmlspecialchars($row['imagem']);
                $imagem = file_exists($imagemPath) ? $imagemPath : "assets/img/placeholder.jpg";

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

        $stmt->close();
        $conexao->close();
        ?>
        <a href="logout.php" class="sair">Sair</a>
    </div>
</section>
<br>
<footer class="rodape">
    <p><img src="assets/img/colherIcon.png" alt="colher" width="200px"></p>
    <p>Todos os direitos reservados</p>
    <p>Desenvolvido por: Arthur Ido -- André Yuki -- Antony Schimit</p>
    <p style="font-family: monospace;">Data: 14/03</p>
    <p style="font-family: monospace;">Versão: Beta</p>
</footer>

<script src="assets/js/botaoCriar.js"></script>
</body>
</html>
