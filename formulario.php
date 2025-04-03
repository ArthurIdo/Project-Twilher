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

<body class="fundo p-3 m-0 border-0 bd-example m-0 border-0 bd-example-cssgrid">

    <!-- INICIO NAVBAR -->
    <header>
        <a href="index.html"><img class="logo" src="assets/img/colherIcon.png" alt="logo"></a>

        <div class="nav_links">
            <a href="index.html">Home</a>
            <a href="receitas.html">Receitas</a>
            <a href="exibirPublicacao.php">Comunidade </a>
        </div>

        <a class="perfilnav" href="perfil.html">Perfil</a>
        <!-- FIM NAVBAR -->
    </header>

    <section>
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
    </section>

    <section>
        <footer class="rodape">
            <p><img src="assets/img/colherIcon.png" alt="colher" width="200px"></p>
            <p>Todos os direitos reservados</p>
            <p>Desenvolvido por: <a href=""></a></p>
            <p>Data: </p>
            <p>Versão: </p>
        </footer>
    </section>

    <script src="assets/js/script.js"></script>
</body>

</html>