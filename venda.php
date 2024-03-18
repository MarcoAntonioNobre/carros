<?php

include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");


if (isset($_POST['idVenda']) && !empty($_POST['idVenda'])) {
    $idVenda = $_POST['idVenda'];
}

?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Área do administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

<?php include_once('navbar.php') ?>

<div class="container">
    <div class="row height">
        <div class="col-lg-5">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">

                    <?php
                    $fotos = listarTabela('idfoto,idcarro,foto', 'foto');
                    foreach ($fotos as $foto) {
                        $idcar = $foto->idcarro;
//                        $img = $foto->foto;
                        if ($idcar == $idVenda) {
                            $img = $foto->foto;
                        }
//                        echo $img;
                        ?>
                        <div class="carousel-item">
                            <img src="./img/<?php echo $img ?>" class="d-block w-100" alt="...">
                        </div>
                        <?php
                    }
                    ?>
                    <div class="carousel-item active">
                        <img src="./img/<?php echo $img ?>" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="text-center fs-3">
                <?php
                $grupo = listarTabela('*', 'carro');
                foreach ($grupo as $grupoItem) {
                    $idCarro = $grupoItem->idcarro;
                    if ($idCarro == $idVenda) {
                        $nomeGrupo = $grupoItem->nomeCarro;
                    }
                }
                echo $nomeGrupo;
                ?>
            </div>
            <div>
                <b>Nome da equipe:</b> <?php
                $grupo = listarTabela('*', 'carro');
                foreach ($grupo as $grupoItem) {
                    $idCarro = $grupoItem->idcarro;
                    if ($idCarro == $idVenda) {
                        $nomeGrupo = $grupoItem->nomeCarro;
                    }
                }
                echo $nomeGrupo;
                ?>
            </div>
            <div>
                <b>Líder:</b>
                <?php
                $grupo = listarTabela('*', 'lidervale');
                foreach ($grupo as $grupoItem) {
                    $idProp = $grupoItem->idproprietario;
                    if ($idProp == $idVenda) {
                        $nomeLider = $grupoItem->nomeLider;
                    }
                }
                echo $nomeLider;
                ?>
            </div>
            <b>
                Integrantes:
            </b>
            <?php
            $grupo = listarTabela('*', 'integrantesvale');
            foreach ($grupo as $grupoItem) {
                $idInte = $grupoItem->idproprietario;
                if ($idInte == 1) {
                    $integrantes = $grupoItem->nomeIntegrantes;
                }
                echo $integrantes.', ';
            }

            ?>

        </div>
    </div>
</div>


<?php
include_once 'footer.php';
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"
        integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./js/script.js"></script>
<script src="./js/funcoes.js"></script>
</body>

</html>