<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");


if ($_SESSION['idadm']) {
    $idUsuario = $_SESSION['idadm'];
    //echo '<p class="text-white">'.$idUsuario.'</p>';
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
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
</head>

<body class="fundo">
<div>
    <div class="tudo">
        <?php include_once('navbar.php') ?>


        <div class="container mt-5 text-center bg-black">
            <div class="pt-3 row">
                <div class="col-md-1">
                    <a href="adm.php"><i class="fa-solid fa-gear text-white"></i></a>
                </div>
                <div class="col-md-4">
                    <a href="dashboard.php" class="links text-white margem" onclick="carregarConteudo('listarCarros')">Ver
                        Todos</a>
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-4">
                    <p class="d-inline-flex gap-1">
                        <a class="links text-white margem" data-bs-toggle="collapse" href="#collapseExample"
                           role="button" aria-expanded="false" aria-controls="collapseExample" id="teste">
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
                                <button class="btn btn-outline-light" id="btnPesquisa" name="btnPesquisa" type="submit"
                                        onclick="pesquisarCarros('btnPesquisa', 'pesquisarCarro', 'inputPesquisa', 'nao', 'pesquisaCarro')">
                                    Buscar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container">
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
                        $precoConvertido = conversorDBNum($preco);
                        $diferenciais = $carro->diferenciais;
                        $nomeCarro = mb_strtolower($nomeCarro);
                        $nomeCarro = converterAcentuacao($nomeCarro);
                        $diferenciais = mb_strtolower($diferenciais);
                        $diferenciais = converterAcentuacao($diferenciais);
                        ?>

                        <div class="col-lg-4 col-md-4 col-12 ">
                            <div class="card mt-4" style="width: 18rem;">
                                <img src="./img/<?php echo $foto; ?>" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?php echo $nomeCarro ?></h5>
                                    <button type="submit" class="btn btn-outline-dark" data-bs-toggle="modal"
                                            onclick="abrirModalCompra('<?php echo $idcarro ?>','<?php echo $preco ?>')">
                                        Ver Mais
                                    </button>
                                </div>
                            </div>

                        </div>
                        <?php
                        ++$contar;
                    }
                } else {
                    ?>
                    <div style="display: flex;justify-content: center;align-items: center; min-height: 95vh !important;">
                        <h1>Página Vazia, Retorne. </h1><sup>Error 404</sup>
                        <img src="./img/vazio.gif" alt="ERROR 404">
                    </div>
                    <?php
                }

                ?>
            </div>
        </div>

        <?php
        include_once './footer.php';
        ?>
    </div>


    <!-- Modal de compra-->
    <div class="modal fade" id="vermais" tabindex="-1"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Comprar
                        carro <?php echo "$nomeCarro"; ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <b>Valor do veículo:</b> <?php echo $precoConvertido ?>
                    </div>
                    <div class="mt-2">
                        <B>Diferenciais:</B> <?php echo $diferenciais ?>
                    </div>
                    <form action="" name="frmCompra" id="frmCompra">
                        <div class="mt-3">
                            <div class="wave-group">
                                <div>
                                    <input type="number" name="idcompra" id="idcompra" hidden="hidden" >
                                    <input type="text" name="precoVeiculo" id="precoVeiculo" hidden="hidden" >
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
                                    <label for="codCartao">Número do cartão:</label>
                                    <input type="text" name="codCartao" id="codCartao" class="form-control">
                                </div>
                                <div class="mt-3">
                                    <div class="wave-group">
                                        <input required="required" type="number" class="input" name="inQuantidade"
                                               id="inQuantidade">
                                        <span class="bar"></span>
                                        <label class="label">
                                            <span class="label-char" style="--index: 0">Q</span>
                                            <span class="label-char" style="--index: 1">u</span>
                                            <span class="label-char" style="--index: 2">a</span>
                                            <span class="label-char" style="--index: 3">n</span>
                                            <span class="label-char" style="--index: 3">t</span>
                                            <span class="label-char" style="--index: 3">i</span>
                                            <span class="label-char" style="--index: 3">d</span>
                                            <span class="label-char" style="--index: 3">a</span>
                                            <span class="label-char" style="--index: 3">d</span>
                                            <span class="label-char" style="--index: 3">e</span>
                                            <span class="label-char" style="--index: 3">:</span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Fechar
                    </button>
                    <button type="submit" class="btn btn-success" id="btnCompra">Comprar</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"
            integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/script.js"></script>
    <script src="./js/funcoes.js"></script>
</body>

</html>