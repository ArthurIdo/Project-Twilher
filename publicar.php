<?php

    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "twilher tcc";


    $conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pegar dados do formulário
    $titulo = $conn->real_escape_string($_POST['titulo']);
    $conteudo = $conn->real_escape_string($_POST['conteudo']);

    // Inserir dados no banco de dados
    $sql = "INSERT INTO publicacoes (titulo, conteudo) VALUES ('$titulo', '$conteudo')";

    if ($conn->query($sql) === TRUE) {
        // Redireciona para a página inicial após a publicação
        header("Location: exibirPublicacao.php");
        exit(); // Garante que o script pare de executar após o redirecionamento
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

// Fechar conexão
$conn->close();
