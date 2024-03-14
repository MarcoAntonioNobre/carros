<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Bootstrap demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
</head>

<body class="fundo">
<div id="page-container">
    <div id="content-wrap" class="tudo">
        <nav class="navbar navbar-expand-lg bg-black">
            <div class="container-fluid">
                <img src="./img/Inserir um título.png" alt="logomarca" width="60px">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a href="./index.php" class="btn btn-outline-light" type="submit">Sair</a>
                </div>
            </div>
        </nav>


        <div class="container mt-5 text-center bg-black">
            <div class="pt-3 row">
                <div class="col-md-4">
                    <a href="" class="links text-white margem">Lista</a>
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <p class="d-inline-flex gap-1">
                        <a class="links text-white margem" data-bs-toggle="collapse" href="#collapseExample"
                           role="button" aria-expanded="false" aria-controls="collapseExample">
                            Pesquisar Código
                        </a>
                    </p>
                </div>
                <div class="collapse mb-3" id="collapseExample">
                    <div class="card card-body bg-black p-5">
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <form class="d-flex" role="search">
                                <input class="form-control me-2 " width="75%" type="search" placeholder="Digite o código"
                                       aria-label="Buscar carro">
                                <button class="btn btn-outline-light" type="submit">Buscar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container mt-3">

        <?php
        include_once './carros.php';
        ?>
        </div>
    </div>


    <?php
    include_once './footer.php';
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"
        integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./js/script.js"></script>
</body>

</html>