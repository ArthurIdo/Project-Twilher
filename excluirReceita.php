<?php
session_start();

if (!isset($_SESSION['usuario']) || !isset($_POST['id_receita'])) {
    header('Location: receitas.php');
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "twilher tcc";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$id_receita = intval($_POST['id_receita']);
$id_usuario = $_SESSION['id_usuario'];

// Verifica se o usuário é o dono da publicação
$sql = "SELECT id FROM publicacoes WHERE id = ? AND id_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id_receita, $id_usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Exclui a publicação
    $sql_delete = "DELETE FROM publicacoes WHERE id = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("i", $id_receita);
    $stmt_delete->execute();
}

$conn->close();
header("Location: receitas.php");
exit();


