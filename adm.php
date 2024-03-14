<?php

include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Área do administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                <div>
                    <button type="button" onclick="carregarConteudo('listarCarros')">Carros</button>
                </div>
                <div>
                    <button type="button" onclick="carregarConteudo('listarProprietarios')">Proprietários</button>
                </div>
                <div>
                    <button type="button" onclick="carregarConteudo('listarCliente')">Clientes</button>
                </div>
            </div>
            <div class="col-lg-10">
                <div name="show" id="show"></div>
            </div>
        </div>
    </div>

    <!-- Modal de cadastro de cliente -->
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
                                    <label for="inpNome" class="label-control">Nome:</label>
                                    <input type="text" name="inpNome" id="inpNome" class="form-control">
                                </div>
                                <div>
                                    <label for="inpCpf">CPF:</label>
                                    <input type="text" name="inpCpf" id="inpCpf">
                                </div>
                                <div>
                                    <label for="inpContato">Contato:</label>
                                    <input type="text" name="inpContato" id="inpContato">
                                </div>
                                <div>
                                    <label for="inpValorUnitario">Valor Unitário:</label>
                                    <input type="text" name="inpValorUnitario" id="inpValorUnitario">
                                </div>
                                <div>
                                    <label for="inpCartao">Cartão:</label>
                                    <input type="text" name="inpCartao" id="inpCartao">
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnCadCliente">Cadastrar</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
    <script src="./js/funcoes.js"></script>
</body>

</html>