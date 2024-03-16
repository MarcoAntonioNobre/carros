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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2">
            <div>
                <div onclick="carregarConteudo('listarCarros')">Carros</div>
            </div>
            <div>
                <div onclick="carregarConteudo('listarProprietarios')">Proprietários</div>
            </div>
            <div>
                <div onclick="carregarConteudo('listarCliente')">Clientes</div>
            </div>
            <div>
                <div onclick="carregarConteudo('listarFoto')">Fotos</div>
            </div>
            <div>
                <div onclick="carregarConteudo('listarTotal')">Total de vendas</div>
            </div>
        </div>
        <div class="col-lg-10">
            <div name="show" id="show"></div>
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
                                <label for="inpNome" class="label-control">Nome:</label>
                                <input type="text" name="inpNome" id="inpNome" class="form-control" required="required">
                            </div>
                            <div>
                                <label for="inpContato">Contato:</label>
                                <input type="text" name="inpContato" id="inpContato">
                            </div>
                            <div>
                                <label for="inpValorUnitario">Valor de cada unidae:</label>
                                <input type="text" name="inpValorUnitario" id="inpValorUnitario">
                            </div>
                            <div>
                                <label for="inpValorCartao">Valor em cartão:</label>
                                <input type="text" name="inpValorCartao" id="inpValorCartao">
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

<!-- Modal de cadastro de PROPRIETÁRIO -->
<div class="modal fade" id="cadProprietario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" name="frmAddProprietario" id="frmAddProprietario">
                <div class="modal-body">
                    <div>
                        <label for="nomeProprietario">Nome:</label>
                        <input type="text" name="nomeProprietario"
                               id="nomeProprietario" required="required">
                    </div>
                    <div>
                        <label for="contatoProprietario">Telefone:</label>
                        <input type="text" name="contatoProprietario" class="telefoneBR"
                               id="contatoProprietario">
                    </div>
                    <div>
                        <label for="fotoProprietario">Foto:</label>
                        <input type="file" name="fotoProprietario" class=""
                               id="fotoProprietario" alt="">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnAddProprietario">Criar Cadastro</button>
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
                                <label for="inpNomeCarro" class="label-control">Nome:</label>
                                <input type="text" name="inpNomeCarro" id="inpNomeCarro" class="form-control"
                                       required="required">
                            </div>
                            <div>
                                <label for="inpDiferenciais">Diferenciais:</label>
                                <input type="text" name="inpDiferenciais" id="inpDiferenciais" required="required">
                            </div>
                            <div>
                                <label for="inpValor">Valor:</label>
                                <input type="text" name="inpValor" id="inpValor" required="required">
                            </div>
                            <div>
                                <label for="selectProprietario">Selecione o proprietário:</label>
                                <select name="selectProprietario" id="selectProprietario">
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnCadCarro">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<script src="./js/funcoes.js"></script>
</body>
</html>
