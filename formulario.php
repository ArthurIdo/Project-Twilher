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
    <title>Home</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/formulario.css">
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
            <p>FORMULÁRIO PARA ENVIO DE RECEITA</p>
        </div>

        <form action="enviarReceita.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nome_receita" class="form-label">Nome da Receita</label>
                <input type="text" class="form-control" id="nome_receita" name="nome_receita" required>
            </div>

            <div class="mb-3">
                <label for="pais_origem" class="form-label">País de Origem</label>
                <select class="form-select" id="pais_origem" name="pais_origem" required>
                    <option selected disabled value="">Escolha...</option>
                    <option value="Brasil">Brasil</option>
                    <option value="México">México</option>
                    <option value="Itália">Itália</option>
                    <option value="Japão">Japão</option>
                    <option value="China">China</option>
                    <option value="Índia">Índia</option>
                    <option value="França">França</option>
                    <option value="Turquia">Turquia</option>
                    <option value="Mundo">Mundo</option>
                    <option value="Criação">Criação</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="modo_preparo" class="form-label">Passo a passo:</label>
                <textarea class="form-control" id="modo_preparo" name="modo_preparo" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem da Receita</label>
                <input class="form-control" type="file" id="imagem" name="imagem" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="tempo_preparo" class="form-label">Tempo de Preparo</label>
                <select class="form-select" id="tempo_preparo" name="tempo_preparo" required>
                    <option selected disabled value="">Escolha...</option>
                    <option>5 Min</option>
                    <option>6 Min</option>
                    <option>7 Min</option>
                    <option>8 Min</option>
                    <option>9 Min</option>
                    <option>10 Min</option>
                    <option>15 Min</option>
                    <option>+20 Min</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Enviar Receita</button>

            <div style="margin-top: 15px;">
                <a href="receitas.php" class="back-link">← Voltar para Receitas</a>
                <br>
                <a href="perfil.php" class="back-link">← Voltar Perfil</a>
            </div>

        </form>
    </div>

    <br><br>

    <!-- <section>
        <div class="">
            <div class="titulo">
                <p>FORMULÁRIO PARA ENVIO DE RECEITA</p>
            </div>

            <div class="formulario">
                <div class="p-4">
                    <label for="email" class="form-label">Nome Receita:</label>
                    <input type="text" id="text" class="form-control">
                </div>

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      País de origem da receita:
                    </button>
                    <ul class="dropdown-menu">
                      <li><button class="dropdown-item" type="button">Brasil</button></li>
                      <li><button class="dropdown-item" type="button">México</button></li>
                      <li><button class="dropdown-item" type="button">Itália</button></li>
                      <li><button class="dropdown-item" type="button">Japão</button></li>
                      <li><button class="dropdown-item" type="button">China</button></li>
                      <li><button class="dropdown-item" type="button">índia</button></li>
                      <li><button class="dropdown-item" type="button">França</button></li>
                      <li><button class="dropdown-item" type="button">Turquia</button></li>
                      <li><button class="dropdown-item" type="button">Mundo</button></li>
                      <li><button class="dropdown-item" type="button">Criação</button></li>
                    </ul>
                  </div>

                <div class="p-4">
                    <label for="senha" class="form-label">Modo de preparo:</label>
                    <textarea class="form-control" id="text" rows="3"></textarea>
                </div>

                <div class="posicaoAnexar">
                    <input type="file" id="enviarArquivo" accept="image/*" hidden>
                    <button id="botaoEnviar" class="botaoAnexar" onclick="document.getElementById('enviarArquivo').click()">
                        Anexar Imagem
                    </button>
                    <div id="visualizacao"></div>
                </div>

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Tempo de preparo:
                    </button>
                    <ul class="dropdown-menu">
                      <li><button class="dropdown-item" type="button">5 Min</button></li>
                      <li><button class="dropdown-item" type="button">6 Min</button></li>
                      <li><button class="dropdown-item" type="button">7 Min</button></li>
                      <li><button class="dropdown-item" type="button">8 Min</button></li>
                      <li><button class="dropdown-item" type="button">9 Min</button></li>
                      <li><button class="dropdown-item" type="button">10 Min</button></li>
                      <li><button class="dropdown-item" type="button">15 Min</button></li>
                      <li><button class="dropdown-item" type="button">+20 Min</button></li>
                    </ul>
                  </div>
            </div>
            <div class="botaoCriarReceita">
                <p class="text-center"><button class="botaoEnviar" onclick="buttonClicked()">ENTRAR</button></p>
            </div>
        </div>
    </section> -->

    <section>
        <footer class="rodape">
            <p><img src="assets/img/colherIcon.png" alt="colher" width="200px"></p>
            <p>Todos os direitos reservados</p>
            <p>Desenvolvido por: Arthur Ido -- André Yuki -- Antony Schimit<a href=""></a></p>
            <p style="font-family: monospace;">Data: 14/03</p>
            <p style="font-family: monospace;">Versão: Beta</p>
        </footer>
    </section>

    <script src="assets/js/botaoCriar.js"></script>
</body>

</html>