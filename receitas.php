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

    <div>
        <button class="botaoCriar" onclick="abrirNovaAba()">CRIAR</button>
    </div>

    <style>
    .receitas {
        display: flex;
        flex-direction: column;
        gap: 20px;
        padding: 20px;
        font-family: Arial, sans-serif;
        align-items: center;
    }

    .card-receita {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 90%;
        max-width: 1000px;
        overflow: hidden;
        display: flex;
        transition: transform 0.2s;
    }

    .card-receita:hover {
        transform: scale(1.01);
    }

    .imagem {
        flex: 0 0 300px;
        height: 200px;
        overflow: hidden;
        background: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .imagem img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .conteudo-receita {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .conteudo-receita h2 {
        font-size: 22px;
        margin: 0 0 10px 0;
    }

    .conteudo-receita p {
        margin: 5px 0;
        color: #555;
        font-size: 16px;
    }

    .link-receita {
    display: flex;
    flex-direction: row;
    text-decoration: none;
    color: inherit;
    width: 100%;
    height: 100%;
}

</style>

<div>
    <h1 class="text-center home">Receitas</h1>
    <p class="text-center texto">Publicadas por usuários</p>
    
    <!-- <div class="d-flex justify-content-center flex-wrap gap-3 pb-5">
                <button class="btn btn-warning">Doces</button>
                <button class="btn btn-warning">Salgados</button>
                <button class="btn btn-warning">Fitness</button>
                <button class="btn btn-warning">Vegetariano</button>
                <button class="btn btn-warning">Rápido</button>
                <button class="btn btn-warning">Café da Manhã</button>
                <button class="btn btn-warning">Almoço</button>
                <button class="btn btn-warning">Jantar</button>
                <button class="btn btn-warning">Lanches / Snacks</button>
                <button class="btn btn-warning">Sobremesas</button>
                <button class="btn btn-warning">Massas</button>
                <button class="btn btn-warning">Arroz e Risotos</button>
                <button class="btn btn-warning">Carnes</button>
                <button class="btn btn-warning">Frango</button>
                <button class="btn btn-warning">Peixes e Frutos do Mar</button>
                <button class="btn btn-warning">Sopas e Caldos</button>
                <button class="btn btn-warning">Saladas</button>
                <button class="btn btn-warning">Marmitas</button>
                <button class="btn btn-warning">Vegano</button>
                <button class="btn btn-warning">Sem Glúten</button>
                <button class="btn btn-warning">Sem Lactose</button>
    </div> -->
</div>

<?php
$sql = "SELECT id, nome, pais_origem, modo_preparo, tempo_preparo, imagem, data_envio FROM receitas";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='receitas'>";
    while ($row = $result->fetch_assoc()) {
        $imagemPath = "uploads/" . htmlspecialchars($row['imagem']);

        echo "<div class='card-receita'>";
        echo "<a href='detalhes.php?id=" . $row['id'] . "' class='link-receita'>";
        
        if (file_exists($imagemPath)) {
            echo "<div class='imagem'><img src='" . $imagemPath . "' alt='" . htmlspecialchars($row['nome']) . "' /></div>";
        } else {
            echo "<div class='imagem'><img src='placeholder.jpg' alt='Imagem não disponível' /></div>";
        }

        echo "<div class='conteudo-receita'>";
        echo "<h2>Usuário #Arthur Ido" . "</h2>";
        echo "<h2>" . htmlspecialchars($row['nome']) . "</h2>";
        echo "<p><strong>País de origem:</strong> " . htmlspecialchars($row['pais_origem']) . "</p>";
        echo "<p><strong>Tempo de preparo:</strong> " . htmlspecialchars($row['tempo_preparo']) . "</p>";
        echo "<p style='display: flex; justify-content: center;'><strong>Publicado em:  </strong>" . $row['data_envio'] . "</p>";
        echo "</div>"; // .conteudo-receita

        echo "</a>";
        echo "</div>"; // .card-receita
    }
    echo "</div>"; // .receitas
} else {
    echo "<p style='text-align:center; font-family: Arial;'>Nenhuma receita encontrada.</p>";
}
?>



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

<?php
$conexao->close();
?>







<!-- <!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/receitas.css">
    <link rel="shortcut icon" href="assets/img/colherFavicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>

<body class="fundo m-0 border-0 bd-example m-0 border-0 bd-example-cssgrid"> -->

<!-- INICIO NAVBAR -->
<!-- <header>
        <a href="index.html"><img class="logo" src="assets/img/colherIcon.png" alt="logo"></a>

        <div class="nav_links">
            <a href="index.html">Home</a>
            <a href="receitas.html">Receitas</a>
            <a href="exibirPublicacao.php">Comunidade </a>
        </div>

        <a class="perfilnav" href="perfil.php">Perfil</a> -->
<!-- FIM NAVBAR -->
<!-- </header>

    <section>
        <div>
            <h1 class="home">Receitas</h1>
        </div>

        <div class="container">

            <a href="#" class="receita" target="_blank">
                <div class="imagem"><img src="https://media.tenor.com/dIaP-9Yp9fIAAAAM/super-idol.gif" width="100%"
                        alt=""></div>
                <div class="conteudo">
                    <div class="titulo">Super Idol</div>
                    <div class="descricao">O super idol de xiao rong é um idol de propaganda de uma marca d'água, que
                        viralisou nas redes sociais por ser muito muito engraça...</div>
                </div>
            </a>
        </div>

    </section> -->
<!-- espaço em branco -->
<!-- <br>

    <footer class="rodape">
        <p><img src="assets/img/colherIcon.png" alt="colher" width="200px"></p>
        <p>Todos os direitos reservados</p>
        <p>Desenvolvido por: Arthur Ido; André Yuki; Antony Schimit<a href=""></a></p>
        <p style="font-family: monospace;">Data: 14/03</p>
        <p style="font-family: monospace;">Versão: Beta</p>
    </footer>


    <script src="assets/js/botaoCriar.js"></script>
</body>

</html> -->