<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");
$adm = 0;

if ($_SESSION['idadm']) {
    $idUsuario = $_SESSION['idadm'];
} else {
    session_destroy();
    header('location: index.php?error=404');
}
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>StreetCar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
    <link rel="stylesheet" href="./css/style-navbar.css">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/style.css">

</head>

<body class="">

<div class="tudo">
    <?php include_once('navbar.php') ?>


    <div class="container mt-5 text-center bg-black">
        <div class="pt-3 row">
            <div class="col-md-1 d-flex justify-content-center align-items-center">
                <ul class="list-unstyled wrapper ">
                    <a href="adm.php">
                        <li class="icon config bg-black">
                            <span class="tooltip">Administrador</span>
                            <span><i class="fa-solid fa-gear text-white spinner is-animating"></i></span>
                        </li>
                    </a>
                </ul>
            </div>
            <div class="col-md-4 d-flex justify-content-center align-items-center">
                <a href="dashboard.php" class="links text-white margem" onclick="carregarConteudo('listarCarros')">Ver
                    Todos</a>
            </div>
            <div class="col-md-3">
            </div>
            <div class="col-md-4 d-flex justify-content-center align-items-center">
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
                        <form class="d-flex" role="search" id="pesquisaCarro" name="pesquisaCarro">
                            <input class="form-control me-2 " width="75%" type="search"
                                   placeholder="Digite o código" aria-label="Buscar carro" id="inputPesquisa"
                                   name="inputPesquisa">
                            <button class="btn btn-outline-light" id="btnPesquisa" name="btnPesquisa"
                                    type="submit"
                                    onclick="pesquisarCarros('btnPesquisa', 'pesquisarCarro', 'inputPesquisa', 'nao', 'pesquisaCarro')">
                                Buscar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container alturaDash">

        <div class="mostrar" id="mostrar">


            <div class="row d-flex justify-content-center align-items-center">

                <?php
                $contar = 1;
                $carros = listarTabela('idcarro, nomeCarro,fotoPerfil,preco,diferenciais', 'carro');

                if ($carros !== 'Vazio') {

                    foreach ($carros as $carro) {
                        $idcarro = $carro->idcarro;
                        $nomeCarro = $carro->nomeCarro;
                        $foto = $carro->fotoPerfil;
                        $preco = $carro->preco;

                        $diferenciais = $carro->diferenciais;
                        $nomeCarro = mb_strtolower($nomeCarro);
                        $nomeCarro = converterAcentuacao($nomeCarro);
                        $diferenciais = mb_strtolower($diferenciais);
                        $diferenciais = converterAcentuacao($diferenciais);
                        ?>

                        <div class="col-xl-2 col-lg-2 col-md-4 col-6 mt-3">
                            <div class="cardDash mt-3">
                                <div class="content">
                                    <div class="back">
                                        <div class="back-content">

                                            <svg stroke="#ffffff"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50"
                                                 height="50px" width="50px" fill="#ffffff">
                                                <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                                                <g stroke-linejoin="round" stroke-linecap="round"
                                                   id="SVGRepo_tracerCarrier"></g>
                                                <g id="SVGRepo_iconCarrier">

                                                    <img src="./img/<?php echo $foto ?>" style="border-radius: 10px"
                                                         width="90%" alt="<?php echo $nomeCarro ?>"
                                                         title="<?php echo $nomeCarro ?>">


                                                </g>

                                            </svg>
                                            <strong><?php echo $nomeCarro ?></strong>
                                        </div>
                                    </div>
                                    <div class="front">

                                        <div class="img">
                                            <div class="circle">
                                            </div>
                                            <div class="circle" id="right">
                                            </div>
                                            <div class="circle" id="bottom">
                                            </div>
                                        </div>

                                        <div class="front-content">
                                            <small class="badge"><?php echo $nomeCarro ?></small>
                                            <div class="description">
                                                <div class="title">
                                                    <p class="title">
                                                        <strong>Comprar</strong>
                                                    </p>
                                                    <svg fill-rule="nonzero" height="15px" width="15px"
                                                         viewBox="0,0,256,256"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <g style="mix-blend-mode: normal" text-anchor="none"
                                                           font-size="none" font-weight="none" font-family="none"
                                                           stroke-dashoffset="0" stroke-dasharray=""
                                                           stroke-miterlimit="10" stroke-linejoin="miter"
                                                           stroke-linecap="butt" stroke-width="1" stroke="none"
                                                           fill-rule="nonzero" fill="#20c997">
                                                            <g transform="scale(8,8)">
                                                                <path d="M25,27l-9,-6.75l-9,6.75v-23h18z"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <p class="card-footer text-center">
                                                    <button type="submit" class="btn btn-outline-light"
                                                            data-bs-toggle="modal"
                                                            onclick="abrirModalCompra('<?php echo $idcarro ?>','<?php echo $preco ?>','<?php echo $nomeCarro ?>','<?php echo $diferenciais ?>')">
                                                        Ver Mais
                                                    </button>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <?php

                        ++$contar;
                    }
                } else {
                    ?>
                    <div style="display: flex;justify-content: center;align-items: center; min-height: 95vh !important;">
                        <h1>Página Vazia. </h1>
                        <img src="./img/vazio.gif" alt="vazio">
                    </div>
                    <?php
                }

                ?>
            </div>
        </div>
    </div>
    <?php
    include_once './footer.php';
    ?>
</div>


<!-- Modal de compra-->
<div class="modal fade" id="vermais" data-bs-backdrop="static" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tituloCarro">Comprar
                    carro</h1>
            </div>
            <div class="modal-body">
                <div>

                </div>
                <div>
                    <b>Valor do veículo:</b> <em id='precoCarro'></em>
                </div>
                <div class="mt-2">
                    <B>Diferenciais:</B> <em id='diferenciaisCarro'></em>
                </div>
                <form action="" name="frmCompra" id="frmCompra">
                    <div class="mt-3">
                        <div class="wave-group">
                            <div>
                                <input type="number" name="idcompra" id="idcompra" hidden="hidden">
                                <input type="text" name="precoVeiculo" id="precoVeiculo" hidden="hidden">
                            </div>

                            <div class="mt-3">
                                <input type="radio" id="cartao" name="cartao" class="ui-checkbox"
                                       required="required">
                                <label for="cartao">Cartão</label>
                            </div>
                            <div>
                                <input type="radio" id="dinheiro" name="cartao" class="ui-checkbox"
                                       required="required">
                                <label for="dinheiro">Dinheiro</label>
                            </div>
                            <div class="mt-3" id="cartaoCod" style="display: none">
                                <div class="wave-group">
                                    <input minlength="5" maxlength="6" type="text" class="input"
                                           name="codCartao" id="codCartao">
                                    <span class="bar"></span>
                                    <label class="label">
                                        <span class="label-char" style="--index: 0">C</span>
                                        <span class="label-char" style="--index: 1">a</span>
                                        <span class="label-char" style="--index: 2">r</span>
                                        <span class="label-char" style="--index: 3">t</span>
                                        <span class="label-char" style="--index: 4">ã</span>
                                        <span class="label-char" style="--index: 5">o</span>

                                    </label>
                                </div>

                            </div>

                            <div class="mt-3">
                                <div class="wave-group">
                                    <input required="required" min="1" type="number" class="input"
                                           name="inQuantidade"
                                           id="inQuantidade">
                                    <span class="bar"></span>
                                    <label class="label">
                                        <span class="label-char" style="--index: 0">Q</span>
                                        <span class="label-char" style="--index: 1">u</span>
                                        <span class="label-char" style="--index: 2">a</span>
                                        <span class="label-char" style="--index: 3">n</span>
                                        <span class="label-char" style="--index: 4">t</span>
                                        <span class="label-char" style="--index: 5">i</span>
                                        <span class="label-char" style="--index: 6">d</span>
                                        <span class="label-char" style="--index: 7">a</span>
                                        <span class="label-char" style="--index: 8">d</span>
                                        <span class="label-char" style="--index: 9">e</span>
                                        <span class="label-char" style="--index: 10">:</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p>Valor total: <b id="valorTotal">R$ 0,00</b></p>
                                <button type="button" id="calcular" name="calcular"
                                        class="btn btn-outline-secondary">Calcular total
                                </button>
                            </div>

                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        onclick="redireciona('dashboard')">Fechar
                </button>
                <button type="submit" class="btn btn-success" id="btnCompra">Comprar</button>
            </div>
            </form>
        </div>
    </div>
</div>


<?php
include_once('teste.php')
?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"
        integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./js/mobile-navbar.js"></script>
<script src="./js/script.js"></script>
<script src="./js/funcoes.js"></script>
</body>

</html>