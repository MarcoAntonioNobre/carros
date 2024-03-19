<?php

include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");


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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Área do administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

<?php include_once('navbar.php') ?>

<div class="container-fluid">
    <div class="row">
        <div id="nav" class="col-lg-2 bg-black text-white text-center fs-5 ">
        <center>
                <div class="inputii">
                    <button class="value" onclick="carregarConteudo('listarCarros')">
                        <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" data-name="Layer 2">
                            <!-- <path fill="#7D8590" d="m1.5 13v1a.5.5 0 0 0 .3379.4731 18.9718 18.9718 0 0 0 6.1621 1.0269 18.9629 18.9629 0 0 0 6.1621-1.0269.5.5 0 0 0 .3379-.4731v-1a6.5083 6.5083 0 0 0 -4.461-6.1676 3.5 3.5 0 1 0 -4.078 0 6.5083 6.5083 0 0 0 -4.461 6.1676zm4-9a2.5 2.5 0 1 1 2.5 2.5 2.5026 2.5026 0 0 1 -2.5-2.5zm2.5 3.5a5.5066 5.5066 0 0 1 5.5 5.5v.6392a18.08 18.08 0 0 1 -11 0v-.6392a5.5066 5.5066 0 0 1 5.5-5.5z"></path> -->
                            <i class="bi bi-car-front-fill"></i>
                        </svg>
                        Carros
                    </button>
                    <button class="value" onclick="carregarConteudo('listarProprietarios')">
                        <svg id="Line" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                            <!-- <path fill="#7D8590" id="XMLID_1646_" d="m17.074 30h-2.148c-1.038 0-1.914-.811-1.994-1.846l-.125-1.635c-.687-.208-1.351-.484-1.985-.824l-1.246 1.067c-.788.677-1.98.631-2.715-.104l-1.52-1.52c-.734-.734-.78-1.927-.104-2.715l1.067-1.246c-.34-.635-.616-1.299-.824-1.985l-1.634-.125c-1.035-.079-1.846-.955-1.846-1.993v-2.148c0-1.038.811-1.914 1.846-1.994l1.635-.125c.208-.687.484-1.351.824-1.985l-1.068-1.247c-.676-.788-.631-1.98.104-2.715l1.52-1.52c.734-.734 1.927-.779 2.715-.104l1.246 1.067c.635-.34 1.299-.616 1.985-.824l.125-1.634c.08-1.034.956-1.845 1.994-1.845h2.148c1.038 0 1.914.811 1.994 1.846l.125 1.635c.687.208 1.351.484 1.985.824l1.246-1.067c.787-.676 1.98-.631 2.715.104l1.52 1.52c.734.734.78 1.927.104 2.715l-1.067 1.246c.34.635.616 1.299.824 1.985l1.634.125c1.035.079 1.846.955 1.846 1.993v2.148c0 1.038-.811 1.914-1.846 1.994l-1.635.125c-.208.687-.484 1.351-.824 1.985l1.067 1.246c.677.788.631 1.98-.104 2.715l-1.52 1.52c-.734.734-1.928.78-2.715.104l-1.246-1.067c-.635.34-1.299.616-1.985.824l-.125 1.634c-.079 1.035-.955 1.846-1.993 1.846zm-5.835-6.373c.848.53 1.768.912 2.734 1.135.426.099.739.462.772.898l.18 2.341 2.149-.001.18-2.34c.033-.437.347-.8.772-.898.967-.223 1.887-.604 2.734-1.135.371-.232.849-.197 1.181.089l1.784 1.529 1.52-1.52-1.529-1.784c-.285-.332-.321-.811-.089-1.181.53-.848.912-1.768 1.135-2.734.099-.426.462-.739.898-.772l2.341-.18h-.001v-2.148l-2.34-.18c-.437-.033-.8-.347-.898-.772-.223-.967-.604-1.887-1.135-2.734-.232-.37-.196-.849.089-1.181l1.529-1.784-1.52-1.52-1.784 1.529c-.332.286-.81.321-1.181.089-.848-.53-1.768-.912-2.734-1.135-.426-.099-.739-.462-.772-.898l-.18-2.341-2.148.001-.18 2.34c-.033.437-.347.8-.772.898-.967.223-1.887.604-2.734 1.135-.37.232-.849.197-1.181-.089l-1.785-1.529-1.52 1.52 1.529 1.784c.285.332.321.811.089 1.181-.53.848-.912 1.768-1.135 2.734-.099.426-.462.739-.898.772l-2.341.18.002 2.148 2.34.18c.437.033.8.347.898.772.223.967.604 1.887 1.135 2.734.232.37.196.849-.089 1.181l-1.529 1.784 1.52 1.52 1.784-1.529c.332-.287.813-.32 1.18-.089z"></path>
                            <path id="XMLID_1645_" fill="#7D8590" d="m16 23c-3.859 0-7-3.141-7-7s3.141-7 7-7 7 3.141 7 7-3.141 7-7 7zm0-12c-2.757 0-5 2.243-5 5s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path> -->
                            <i class="bi bi-person-fill"></i>
                        </svg>
                        Propietários
                    </button>
                    <button class="value" onclick="carregarConteudo('listarCliente')">
                        <svg viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
                            <!-- <path fill="#7D8590" d="m109.9 20.63a6.232 6.232 0 0 0 -8.588-.22l-57.463 51.843c-.012.011-.02.024-.031.035s-.023.017-.034.027l-4.721 4.722a1.749 1.749 0 0 0 0 2.475l.341.342-3.16 3.16a8 8 0 0 0 -1.424 1.967 11.382 11.382 0 0 0 -12.055 10.609c-.006.036-.011.074-.015.111a5.763 5.763 0 0 1 -4.928 5.41 1.75 1.75 0 0 0 -.844 3.14c4.844 3.619 9.4 4.915 13.338 4.915a17.14 17.14 0 0 0 11.738-4.545l.182-.167a11.354 11.354 0 0 0 3.348-8.081c0-.225-.02-.445-.032-.667a8.041 8.041 0 0 0 1.962-1.421l3.16-3.161.342.342a1.749 1.749 0 0 0 2.475 0l4.722-4.722c.011-.011.018-.025.029-.036s.023-.018.033-.029l51.844-57.46a6.236 6.236 0 0 0 -.219-8.589zm-70.1 81.311-.122.111c-.808.787-7.667 6.974-17.826 1.221a9.166 9.166 0 0 0 4.36-7.036 1.758 1.758 0 0 0 .036-.273 7.892 7.892 0 0 1 9.122-7.414c.017.005.031.014.048.019a1.717 1.717 0 0 0 .379.055 7.918 7.918 0 0 1 4 13.317zm5.239-10.131c-.093.093-.194.176-.293.26a11.459 11.459 0 0 0 -6.289-6.286c.084-.1.167-.2.261-.3l3.161-3.161 6.321 6.326zm7.214-4.057-9.479-9.479 2.247-2.247 9.479 9.479zm55.267-60.879-50.61 56.092-9.348-9.348 56.092-50.61a2.737 2.737 0 0 1 3.866 3.866z"></path> -->
                            <i class="bi bi-person-circle"></i>
                        </svg>
                        Cliente
                    </button>
                    <button class="value" onclick="carregarConteudo('listarFoto')">
                        <svg id="svg8" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                            <!-- <g id="layer1" transform="translate(-33.022 -30.617)">
                                <path fill="#7D8590" id="path26276" d="m49.021 31.617c-2.673 0-4.861 2.188-4.861 4.861 0 1.606.798 3.081 1.873 3.834h-7.896c-1.7 0-3.098 1.401-3.098 3.1s1.399 3.098 3.098 3.098h4.377l.223 2.641s-1.764 8.565-1.764 8.566c-.438 1.642.55 3.355 2.191 3.795s3.327-.494 3.799-2.191l2.059-5.189 2.059 5.189c.44 1.643 2.157 2.631 3.799 2.191s2.63-2.153 2.191-3.795l-1.764-8.566.223-2.641h4.377c1.699 0 3.098-1.399 3.098-3.098s-1.397-3.1-3.098-3.1h-7.928c1.102-.771 1.904-2.228 1.904-3.834 0-2.672-2.189-4.861-4.862-4.861zm0 2c1.592 0 2.861 1.27 2.861 2.861 0 1.169-.705 2.214-1.789 2.652-.501.203-.75.767-.563 1.273l.463 1.254c.145.393.519.654.938.654h8.975c.626 0 1.098.473 1.098 1.1s-.471 1.098-1.098 1.098h-5.297c-.52 0-.952.398-.996.916l-.311 3.701c-.008.096-.002.191.018.285 0 0 1.813 8.802 1.816 8.82.162.604-.173 1.186-.777 1.348s-1.184-.173-1.346-.777c-.01-.037-3.063-7.76-3.063-7.76-.334-.842-1.525-.842-1.859 0 0 0-3.052 7.723-3.063 7.76-.162.604-.741.939-1.346.777s-.939-.743-.777-1.348c.004-.019 1.816-8.82 1.816-8.82.02-.094.025-.189.018-.285l-.311-3.701c-.044-.518-.477-.916-.996-.916h-5.297c-.627 0-1.098-.471-1.098-1.098s.472-1.1 1.098-1.1h8.975c.419 0 .793-.262.938-.654l.463-1.254c.188-.507-.062-1.07-.563-1.273-1.084-.438-1.789-1.483-1.789-2.652.001-1.591 1.271-2.861 2.862-2.861z"></path>
                            </g> -->
                            <i class="bi bi-file-earmark-image"></i>
                        </svg>
                        Fotos
                    </button>
                    <button class="value" onclick="carregarConteudo('listarTotal')">
                        <svg fill="none" viewBox="0 0 24 25" xmlns="http://www.w3.org/2000/svg">
                            <!-- <path clip-rule="evenodd" d="m11.9572 4.31201c-3.35401 0-6.00906 2.59741-6.00906 5.67742v3.29037c0 .1986-.05916.3927-.16992.5576l-1.62529 2.4193-.01077.0157c-.18701.2673-.16653.5113-.07001.6868.10031.1825.31959.3528.67282.3528h14.52603c.2546 0 .5013-.1515.6391-.3968.1315-.2343.1117-.4475-.0118-.6093-.0065-.0085-.0129-.0171-.0191-.0258l-1.7269-2.4194c-.121-.1695-.186-.3726-.186-.5809v-3.29037c0-1.54561-.6851-3.023-1.7072-4.00431-1.1617-1.01594-2.6545-1.67311-4.3019-1.67311zm-8.00906 5.67742c0-4.27483 3.64294-7.67742 8.00906-7.67742 2.2055 0 4.1606.88547 5.6378 2.18455.01.00877.0198.01774.0294.02691 1.408 1.34136 2.3419 3.34131 2.3419 5.46596v2.97007l1.5325 2.1471c.6775.8999.6054 1.9859.1552 2.7877-.4464.795-1.3171 1.4177-2.383 1.4177h-14.52603c-2.16218 0-3.55087-2.302-2.24739-4.1777l1.45056-2.1593zm4.05187 11.32257c0-.5523.44772-1 1-1h5.99999c.5523 0 1 .4477 1 1s-.4477 1-1 1h-5.99999c-.55228 0-1-.4477-1-1z" fill="#7D8590" fill-rule="evenodd"></path> -->
                            <i class="bi bi-cash-coin"></i>
                        </svg>
                        Total de Vendas
                    </button>
                    <button class="value" onclick="carregarConteudo('listarAdm')">
                        <svg fill="none" viewBox="0 0 24 25" xmlns="http://www.w3.org/2000/svg">
                            <!-- <path clip-rule="evenodd" d="m11.9572 4.31201c-3.35401 0-6.00906 2.59741-6.00906 5.67742v3.29037c0 .1986-.05916.3927-.16992.5576l-1.62529 2.4193-.01077.0157c-.18701.2673-.16653.5113-.07001.6868.10031.1825.31959.3528.67282.3528h14.52603c.2546 0 .5013-.1515.6391-.3968.1315-.2343.1117-.4475-.0118-.6093-.0065-.0085-.0129-.0171-.0191-.0258l-1.7269-2.4194c-.121-.1695-.186-.3726-.186-.5809v-3.29037c0-1.54561-.6851-3.023-1.7072-4.00431-1.1617-1.01594-2.6545-1.67311-4.3019-1.67311zm-8.00906 5.67742c0-4.27483 3.64294-7.67742 8.00906-7.67742 2.2055 0 4.1606.88547 5.6378 2.18455.01.00877.0198.01774.0294.02691 1.408 1.34136 2.3419 3.34131 2.3419 5.46596v2.97007l1.5325 2.1471c.6775.8999.6054 1.9859.1552 2.7877-.4464.795-1.3171 1.4177-2.383 1.4177h-14.52603c-2.16218 0-3.55087-2.302-2.24739-4.1777l1.45056-2.1593zm4.05187 11.32257c0-.5523.44772-1 1-1h5.99999c.5523 0 1 .4477 1 1s-.4477 1-1 1h-5.99999c-.55228 0-1-.4477-1-1z" fill="#7D8590" fill-rule="evenodd"></path> -->
                            <i class="bi bi-person-gear"></i>
                        </svg>
                        Administradores
                    </button>
                </div>
                </center>
        </div>
        <div class="col-lg-10">
            <div name="show" id="show"></div>
        </div>
    </div>
</div>
<?php
include_once 'footer.php';
?>

 <!-- Modal de cadastro de PROPRIETÁRIO -->
 <div class="modal fade" id="cadProprietario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de proprietário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" name="frmAddProprietario" id="frmAddProprietario">
                    <div class="modal-body">
                    <div class="input-group2">
                        <!-- <label for="nomeProprietario" class="label2">Nome:</label> -->
                        <input type="text" name="nomeProprietario" id="nomeProprietario" class="input2 mt-3" placeholder="Nome:">
                        <div></div></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Voltar</button>
                        <button type="submit" class="btn btn-outline-success" id="btnAddProprietario">Criar Cadastro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Modal de Edit de PROPRIETÁRIO -->
<div class="modal fade" id="editProprietario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edição de proprietário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" name="frmEditProprietario" id="frmEditProprietario">
                    <div class="modal-body">
                        <input type="hidden" name="idEditProprietario" id="idEditProprietario" hidden="hidden">
                        <!-- <label for="nomeEditProprietario">Nome:</label> -->
                        <input type="text" name="nomeEditProprietario" id="nomeEditProprietario" class="input2 mt-3" placeholder="Nome:">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Voltar</button>
                        <button type="submit" class="btn btn-outline-primary" id="btnEditProprietario">Editar Cadastro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal de Delete de PROPRIETÁRIO -->
    <div class="modal fade" id="deleteProprietario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-light">
                    <h1 class="modal-title fs-5 " id="exampleModalLabel">Deletar Proprietário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" name="frmDeleteProprietario" id="frmDeleteProprietario">
                    <div class="modal-body">
                        <input type="text" name="idDeleteProprietario" id="idDeleteProprietario" hidden="hidden">
                        <div class="alert alert-danger">
                            tem certeza?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Voltar</button>
                        <button type="submit" class="btn btn-outline-danger" id="btnDeleteProprietario">Deletar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<!-- Modal de cadastro de CLIENTE -->
<div class="modal fade" id="mdlCadCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar cliente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="" name="frmCadCliente" id="frmCadCliente">
                                <div>
                                    <!-- <label for="inpNome" class="label-control">Nome:</label> -->
                                    <input type="text" name="inpNome" id="inpNome" class="input2 mt-3" required="required" class="input2 mt-3" placeholder="Nome:">
                                </div>
                                <div>
                                    <!-- <label for="inpContato" class="label-control">c:</label> -->
                                    <input type="text" name="inpContato" id="inpContato" class="telefoneBR input2 mt-3" placeholder="Contato:">
                                </div>
                                <div>
                                    <!-- <label for="inpValorUnitario" class="label-control">Valor de cada unidade:</label> -->
                                    <input type="text" name="inpValorUnitario" id="inpValorUnitario" class="dinheiro input2 mt-3" placeholder="Valor de cada unidade:">
                                </div>
                                <div>
                                    <!-- <label for="inpValorCartao" class="label-control">Valor em cartão:</label> -->
                                    <input type="text" name="inpValorCartao" id="inpValorCartao" class="dinheiro input2 mt-3" placeholder="Valor em cartão:">
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-outline-dark" id="btnCadCliente">Cadastrar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<!-- Modal de edit de CLIENTE -->
<div class="modal fade" id="mdlEditCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar cliente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="" name="frmEditCliente" id="frmEditCliente">
                                <input type="text" id="inpEditId" name="inpEditId" hidden="hidden">
                                <div>
                                    <!-- <label for="inpEditNome" class="label-control">Nome:</label> -->
                                    <input type="text" name="inpEditNome" id="inpEditNome" class="input2 mt-3" required="required" placeholder="Nome:">
                                </div>
                                <div>
                                    <!-- <label for="inpEditContato" class="label-control">Contato:</label> -->
                                    <input type="text" name="inpEditContato" id="inpEditContato" class="input2 telefoneBR mt-3" placeholder="Contato:">
                                </div>
                                <div>
                                    <!-- <label for="inpEditValorUnitario" class="label-control">Valor de cada unidade:</label> -->
                                    <input type="text" name="inpEditValorUnitario" id="inpEditValorUnitario" class=" input2 dinheiro mt-3" placeholder="Valor de cada unidade:">
                                </div>
                                <div>
                                    <!-- <label for="inpEditValorCartao" class="label-control">Valor em cartão:</label> -->
                                    <input type="text" name="inpEditValorCartao" id="inpEditValorCartao" class="input2 dinheiro mt-3" placeholder="Valor em cartão:">
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-outline-primary" id="btnEditCliente">Editar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<!-- Modal de Delete de CLIENTE -->
<div class="modal fade" id="mdlDeleteCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-light">
                    <h1 class="modal-title fs-5 " id="exampleModalLabel">Deletar Proprietário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" name="frmDeleteCliente" id="frmDeleteCliente">
                    <div class="modal-body">
                        <input type="text" name="idDeleteCliente" id="idDeleteCliente">
                        <div class="alert alert-danger">
                            tem certeza?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                        <button type="submit" class="btn btn-outline-danger" id="btnDeleteCliente">Deletar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Modal de cadastro de ADM -->
<div class="modal fade" id="cadAdm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de administrador</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" name="frmAddAdm" id="frmAddAdm">
                    <div class="modal-body">
                        <div>
                            <!-- <label for="nomeAdm">Nome:</label> -->
                            <input type="text" name="nomeAdm" id="nomeAdm" required="required" class="input2" placeholder="Nome:">
                        </div>
                        <div>
                            <!-- <label for="cpfAdm">CPF:</label> -->
                            <input type="text" name="cpfAdm" id="cpfAdm" class="cpf" autocomplete="off" required="required" class="input2" placeholder="CPF:">
                        </div>
                        <div>
                            <!-- <label for="senhaAdm">Senha:</label> -->
                            <input type="password" name="senhaAdm" id="senhaAdm" class="" autocomplete="off" required="required" class="input2" placeholder="Senha:">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                        <button type="submit" class="btn btn-success" id="btnAddAdm">Criar Administrador</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Modal de Edit de ADM -->
<div class="modal fade" id="editAdm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edição de administrador</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" name="frmEditAdm" id="frmEditAdm">
                    <div class="modal-body">
                        <input type="hidden" name="idEditAdm" id="idEditAdm">
                        <div>
                            <!-- <label for="nomeEditAdm">Nome:</label> -->
                            <input type="text" name="nomeEditAdm" id="nomeEditAdm" required="required" class="input2" placeholder="Nome:">
                        </div>
                        <div>
                            <!-- <label for="cpfEditAdm">CPF:</label> -->
                            <input type="text" name="cpfEditAdm" id="cpfEditAdm" class="cpf" autocomplete="off" required="required" class="input2" placeholder="CPF:">
                        </div>
                        <div>
                            <!-- <label for="senhaEditAdm">Senha:</label> -->
                            <input type="password" name="senhaEditAdm" id="senhaEditAdm" class="" autocomplete="off" required="required" class="input2" placeholder="Senha:">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                        <button type="submit" class="btn btn-primary" id="btnEditAdm">Editar Administrador</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Modal de Delete de ADM -->
<div class="modal fade" id="deleteAdm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Apagar administrador</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" name="frmDeleteAdm" id="frmDeleteAdm">
                    <div class="modal-body">
                        <input type="text" name="idDeleteAdm" id="idDeleteAdm" hidden="hidden">
                        <div class="alert alert-danger">
                            Tem certeza?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                        <button type="submit" class="btn btn-outline-danger" id="btnDeleteAdm">Deletar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Modal de cadastro de CARRO -->
<div class="modal fade" id="mdlCadCarro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar carro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="" name="frmCadCarro" id="frmCadCarro">
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <!-- <label for="inpNomeCarro" class="label-control">Nome:</label> -->
                                    <input type="text" name="inpNomeCarro" id="inpNomeCarro" class="input2 mt-3" placeholder="Nome:" required="required">
                                </div>
                                <div>
                                    <!-- <label for="inpDiferenciais">Diferenciais:</label> -->
                                    <input type="text" name="inpDiferenciais" id="inpDiferenciais" required="required" class="input2 mt-3" placeholder="Diferenciais:">
                                </div>
                                <div>
                                    <!-- <label for="inpFotoCarro" class="label-control">Foto:</label> -->
                                    
                                    <input type="file" name="inpFotoCarro" id="inpFotoCarro" class="input2 mt-3" placeholder="Foto:" required="required">
                                </div>
                                <div>
                                    <!-- <label for="inpValor">Valor:</label> -->
                                    <input type="text" name="inpValor" id="inpValor" required="required" class="dinheiro input2 mt-3" placeholder="Valor:">
                                </div>
                                <div>
                                    <label for="selectProprietario" class="mt-3">Selecione o proprietário:</label>
                                    <select name="selectProprietario" id="selectProprietario" required="required" class="form-select" aria-label="Default select example">
                                        <option selected>Selecione uma opção</option>
                                        <?php
                                        $proprietarios = listarTabela('*', 'proprietario', 'nome');
                                        if ($proprietarios !== 'Vazio') {
                                            foreach ($proprietarios as $proprietario) {
                                                $id = $proprietario->idproprietario;
                                                $nome = $proprietario->nomeProprietario;
                                        ?>
                                                <option value="<?php echo $id ?>"><?php echo $nome ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Voltar</button>
                        <button type="submit" class="btn btn-outline-dark" id="btnCadCarro">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!--Modal de edicao de carro-->
    <div class="modal fade" id="mdlEditCarro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar carro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="" name="frmEditCarro" id="frmEditCarro">
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" name="idEditCarro" id="idEditCarro" class="input2">
                                <div>
                                    <!-- <label for="inpNomeEditCarro" class="label-control">Nome:</label> -->
                                    <input type="text" name="inpNomeEditCarro" id="inpNomeEditCarro" class="input2 mt-3" placeholder="Nome:" required="required">
                                </div>
                                <div>
                                    <!-- <label for="inpEditDiferenciais">Diferenciais:</label> -->
                                    <input type="text" name="inpEditDiferenciais" id="inpEditDiferenciais" required="required" class="input2 mt-3" placeholder="Diferenciais:">
                                </div>
                                <div>
                                    <!-- <label for="inpEditFotoCarro" class="label-control">Foto:</label> -->
                                    <input type="file" name="inpEditFotoCarro" id="inpEditFotoCarro" class="input2 mt-3" required="required" class="input2 mt-3" placeholder="Foto:">
                                </div>
                                <div>
                                    <!-- <label for="inpEditValor">Valor:</label> -->
                                    <input type="text" name="inpEditValor" id="inpEditValor" required="required" class="dinheiro input2 mt-3" placeholder="Valor:">
                                </div>
                                <div>
                                    <label for="selectEditProprietario" class="mt-3">Selecione o proprietário:</label>
                                    <select name="selectEditProprietario" id="selectEditProprietario" required="required" class="form-select mt-3" aria-label="Default select example">
                                        <option selected>Selecione uma opção</option>
                                        <?php
                                        $proprietarios = listarTabela('*', 'proprietario', 'nome');
                                        if ($proprietarios !== 'Vazio') {
                                            foreach ($proprietarios as $proprietario) {
                                                $id = $proprietario->idproprietario;
                                                $nome = $proprietario->nomeProprietario;
                                        ?>
                                                <option value="<?php echo $id ?>"><?php echo $nome ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Voltar</button>
                        <button type="submit" class="btn btn-outline-primary" id="btnEditCarro">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<!--Modal de cadastro de FOTO-->
<div class="modal fade" id="mdlCadFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Foto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="" name="frmCadFoto" id="frmCadFoto">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <!--                                <label for="inpCarroFoto" class="label-control">Selecione o carro:</label>-->
                                <!--                                <select name="inpCarroFoto" id="inpCarroFoto">-->
                                <!--                                    <option selected>Selecione uma opção</option>-->
                                <!--                                    --><?php
                                //                                    $carro = listarTabela('*', 'carro');
                                //                                    if ($carro !== 'Vazio') {
                                //                                        foreach ($carro as $carros) {
                                //                                            $id = $carros->idcarro;
                                //                                            $nome = $carros->nomeCarro;
                                //                                            ?>
                                <!--                                            <option value="-->
                                <?php //echo $id ?><!--">--><?php //echo $nome ?><!--</option>-->
                                <!--                                            --><?php
                                //                                        }
                                //                                    }
                                //                                    ?>
                                <!--                                </select>-->
                                <!--                            </div>-->
                                <div>
                                <label for="inpGrupo" class="label-control">Selecione o grupo:</label>
                                        <select name="inpGrupo" id="inpGrupo" required="required" class="form-select">
                                        <option selected>Selecione uma opção</option>
                                        <?php
                                        $proprietario = listarTabela('*', 'proprietario');
                                        if ($proprietario !== 'Vazio') {
                                            foreach ($proprietario as $proprietarios) {
                                                $id = $proprietarios->idproprietario;
                                                $nome = $proprietarios->nomeProprietario;
                                                ?>
                                                <option value="<?php echo $id ?>"><?php echo $nome ?></option>
                                                <?php
                                            }
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div>
                                <label for="inpFoto" class="label-control">Foto:</label>
                                        <input type="file" name="inpFoto" id="inpFoto" class="input2 mt-3" placeholder="Foto:" required="required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Voltar</button>
                            <button type="submit" class="btn btn-outline-dark" id="btnCadFoto">Cadastrar</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<!--Modal de edição de foto-->
<!--Tá na pagina de foto-->

<!--Modal de apagar de FOTO-->
<!--Tá na pagina de foto-->


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