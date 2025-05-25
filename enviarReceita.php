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

// Coletar dados do formulário
$nome_receita = $_POST['nome_receita'];
$pais_origem = $_POST['pais_origem'];
$modo_preparo = $_POST['modo_preparo'];
$tempo_preparo = $_POST['tempo_preparo'];
$data_envio = date('Y-m-d'); // Pega a data atual

// Upload da imagem
$imagem_nome = $_FILES['imagem']['name'];
$imagem_tmp = $_FILES['imagem']['tmp_name'];
$caminho_destino = "uploads/" . basename($imagem_nome);

// Criar pasta se não existir
if (!is_dir("uploads")) {
    mkdir("uploads", 0777, true);
}

if (move_uploaded_file($imagem_tmp, $caminho_destino)) {
    $sql = "INSERT INTO receitas (nome, pais_origem, modo_preparo, tempo_preparo, imagem, data_envio) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssssss", $nome_receita, $pais_origem, $modo_preparo, $tempo_preparo, $imagem_nome, $data_envio);

    if ($stmt->execute()) {
        // Redireciona para a página de receitas
        header("Location: receitas.php");
        exit;
    } else {
        echo "Erro ao enviar receita: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Erro ao fazer upload da imagem.";
}

$conexao->close();
?>



