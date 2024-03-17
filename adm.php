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
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

<?php include_once('navbar.php') ?>

<div class="container-fluid">
    <div class="row">
        <div id="nav" class="col-lg-2 bg-black text-white text-center fs-5 ">
            <div class="mt-5 mb-1 pointer ">
                <div onclick="carregarConteudo('listarCarros')">Carros</div>
            </div>
            <div class="mt-3 mb-1 pointer ">
                <div onclick="carregarConteudo('listarProprietarios')">Proprietários</div>
            </div>
            <div class="mt-3 mb-1 pointer ">
                <div onclick="carregarConteudo('listarCliente')">Clientes</div>
            </div>
            <div class="mt-3 mb-1 pointer ">
                <div onclick="carregarConteudo('listarFoto')">Fotos</div>
            </div>
            <div class="mt-3 mb-1 pointer ">
                <div onclick="carregarConteudo('listarTotal')">Total de vendas</div>
            </div>
            <div class="mt-3 mb-1 pointer ">
                <div onclick="carregarConteudo('listarAdm')">Administradores</div>
            </div>
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
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de proprietário</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" name="frmAddProprietario" id="frmAddProprietario">
                <div class="modal-body">

                    <label for="nomeProprietario">Nome:</label>
                    <input type="text" name="nomeProprietario" id="nomeProprietario">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-success" id="btnAddProprietario">Criar Cadastro</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de Edit de PROPRIETÁRIO -->
<div class="modal fade" id="editProprietario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edição de proprietário</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" name="frmEditProprietario" id="frmEditProprietario">
                <div class="modal-body">
                    <input type="text" name="idEditProprietario" id="idEditProprietario" hidden="hidden">
                    <label for="nomeEditProprietario">Nome:</label>
                    <input type="text" name="nomeEditProprietario" id="nomeEditProprietario">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-primary" id="btnEditProprietario">Editar Cadastro</button>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
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
                                <label for="inpNome" class="label-control">Nome:</label>
                                <input type="text" name="inpNome" id="inpNome" class="form-control" required="required">
                            </div>
                            <div>
                                <label for="inpContato" class="label-control">Contato:</label>
                                <input type="text" name="inpContato" id="inpContato" class="form-control telefoneBR">
                            </div>
                            <div>
                                <label for="inpValorUnitario" class="label-control">Valor de cada unidade:</label>
                                <input type="text" name="inpValorUnitario" id="inpValorUnitario"
                                       class="form-control dinheiro">
                            </div>
                            <div>
                                <label for="inpValorCartao" class="label-control">Valor em cartão:</label>
                                <input type="text" name="inpValorCartao" id="inpValorCartao"
                                       class="form-control dinheiro">
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                <button type="submit" class="btn btn-success" id="btnCadCliente">Cadastrar</button>
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
                                <label for="inpEditNome" class="label-control">Nome:</label>
                                <input type="text" name="inpEditNome" id="inpEditNome" class="form-control"
                                       required="required">
                            </div>
                            <div>
                                <label for="inpEditContato" class="label-control">Contato:</label>
                                <input type="text" name="inpEditContato" id="inpEditContato"
                                       class="form-control telefoneBR">
                            </div>
                            <div>
                                <label for="inpEditValorUnitario" class="label-control">Valor de cada unidade:</label>
                                <input type="text" name="inpEditValorUnitario" id="inpEditValorUnitario"
                                       class=" form-control dinheiro">
                            </div>
                            <div>
                                <label for="inpEditValorCartao" class="label-control">Valor em cartão:</label>
                                <input type="text" name="inpEditValorCartao" id="inpEditValorCartao"
                                       class="form-control dinheiro">
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                <button type="submit" class="btn btn-primary" id="btnEditCliente">Editar</button>
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
                        <label for="nomeAdm">Nome:</label>
                        <input type="text" name="nomeAdm" id="nomeAdm">
                    </div>
                    <div>
                        <label for="cpfAdm">CPF:</label>
                        <input type="text" name="cpfAdm" id="cpfAdm" class="cpf" autocomplete="off">
                    </div>
                    <div>
                        <label for="senhaAdm">Senha:</label>
                        <input type="password" name="senhaAdm" id="senhaAdm" class="" autocomplete="off">
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de administrador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" name="frmEditAdm" id="frmEditAdm">
                <div class="modal-body">
                    <input type="text" name="idEditAdm" id="idEditAdm">
                    <div>
                        <label for="nomeEditAdm">Nome:</label>
                        <input type="text" name="nomeEditAdm" id="nomeEditAdm">
                    </div>
                    <div>
                        <label for="cpfEditAdm">CPF:</label>
                        <input type="text" name="cpfEditAdm" id="cpfEditAdm" class="cpf" autocomplete="off">
                    </div>
                    <div>
                        <label for="senhaEditAdm">Senha:</label>
                        <input type="password" name="senhaEditAdm" id="senhaEditAdm" class="" autocomplete="off">
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de administrador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" name="frmDeleteAdm" id="frmDeleteAdm" >
                <div class="modal-body">
                    <input type="text" name="idDeleteAdm" id="idDeleteAdm" hidden="hidden">
                    <div class="alert alert-danger">
                        tem certeza?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-outline-danger" id="btnDeleteAdm">Deletar </button>
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
                                <input type="text" name="inpValor " id="inpValor" required="required" class="dinheiro">
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
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