<?php

include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");
$imprimir = 1;
$adm = 1;

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
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style-navbar.css">
    <link rel="stylesheet" href="./css/navbar.css">

</head>

<body class="dark-mode">

<?php include_once('navbar.php') ?>

<div class="container-fluid">
    <div class="row">
        <div id="nav" class="col-lg-2 col-md-12 bg-black text-white text-center fs-5 ">
            <div class="inputii">
                <button class="value" onclick="refresh()">
                    <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" data-name="Layer 2">
                        <i class="bi bi-bar-chart-line"></i>
                    </svg>
                    Gráfico
                </button>
                <button class="value" onclick="carregarConteudo('listarCarros')">
                    <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" data-name="Layer 2">
                        <i class="bi bi-car-front-fill"></i>
                    </svg>
                    Carros
                </button>
                <button class="value" onclick="carregarConteudo('listarProprietarios')">
                    <svg id="Line" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <i class="bi bi-person-fill"></i>
                    </svg>
                    Propietários
                </button>
                <button class="value" onclick="carregarConteudo('listarCliente')">
                    <svg viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
                        <i class="bi bi-person-circle"></i>
                    </svg>
                    Cliente
                </button>
                <button class="value" onclick="carregarConteudo('listarFoto')">
                    <svg id="svg8" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <i class="bi bi-file-earmark-image"></i>
                    </svg>
                    Fotos
                </button>
                <button class="value" onclick="carregarConteudo('listarTotal')">
                    <svg fill="none" viewBox="0 0 24 25" xmlns="http://www.w3.org/2000/svg">
                        <i class="bi bi-cash-coin"></i>
                    </svg>
                    Total
                </button>
                <button class="value" onclick="carregarConteudo('listarVenda')">
                    <svg fill="none" viewBox="0 0 24 25" xmlns="http://www.w3.org/2000/svg">
                        <i class="bi bi-cash-stack"></i>
                    </svg>
                    Vendas
                </button>
                <button class="value" onclick="carregarConteudo('listarAdm')">
                    <svg fill="none" viewBox="0 0 24 25" xmlns="http://www.w3.org/2000/svg">
                        <i class="bi bi-person-gear"></i>
                    </svg>
                    Admin
                </button>
            </div>
        </div>
        <div class="col-lg-10 col-md-12">
            <div name="show" id="show">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-12 mt-3 d-flex justify-content-center align-items-center">
                        <div class=" d-flex justify-content-center align-items-center  w-100">
                            <canvas id="myChart"></canvas>
                        </div>

                        <?php
                        $RODARODA = 1;

                        $while = 1;
                        while ($while <= 5) {
                            $total = listarTabelaInnerJoinTriploValorPago('valorPago', 'carro', 'proprietario', 'compras', 'idproprietario', 'idproprietario', 'idcarro', 'idcarro', 't.idcarro', $RODARODA);
                            foreach ($total as $to) {
                                $testando2 = $to->soma;
                                $marioMaior[] = $testando2;
                                ++$RODARODA;
                            }
                            $while++;
                        }
                        ?>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <script>
                            const ctx = document.getElementById('myChart');
                            new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['Red Senna', 'Marquinhos', 'Scuderia', 'Fittipaldi', 'FBM'],
                                    datasets: [{
                                        label: 'Vendas(Montante em reais)',
                                        <?php
                                        arsort($marioMaior);

                                        ?>
                                        data: ['<?php echo $marioMaior[0]?>', '<?php echo $marioMaior[1]?>', '<?php echo $marioMaior[2]?>', '<?php echo $marioMaior[3]?>', '<?php echo $marioMaior[4]?>'],

                                        backgroundColor: [
                                            'rgba(0, 0, 0, 0.8)',
                                            'rgba(255,31,31,0.8)',
                                            'rgba(48,112,252,0.8)',
                                            'rgba(12,148,0, 0.8)',
                                            'rgba(0,0,0,0.8)'
                                        ],
                                        borderColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(2,2,2)',
                                            'rgb(255,96,0)',
                                            'rgb(255,96,0)',
                                            'rgb(66,235,54)'
                                        ],
                                        borderWidth: 2
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                    <div class="col-lg-5 col-md-12 col-12 mt-3 d-flex justify-content-center align-items-center ">
                        <div class=" d-flex justify-content-center align-items-center  w-75">
                            <canvas id="myChart2"></canvas>
                        </div>
                        <?php
                        $pagamento = listarTabela('*', 'compras');
                        if ($pagamento !== 'Vazio') {
                            $cartao = 0;
                            $dinheiro = 0;
                            foreach ($pagamento as $pagamentoItem) {
                                $cliente = $pagamentoItem->idcliente;
                                $valorPago = $pagamentoItem->valorPago;
                                if ($cliente === 'null') {
                                    if ($valorPago !== 'null') {
                                        $dinheiro = $valorPago + $dinheiro;
                                    }
                                } else {
                                    if ($valorPago !== 'null') {
                                        $cartao = $valorPago + $cartao;
                                    }

                                }
                            }
                        } else {
                            $dinheiro = 0;
                            $cartao = 0;
                        }


                        ?>

                        <script>
                            const ctx2 = document.getElementById('myChart2');

                            new Chart(ctx2, {
                                type: 'polarArea',
                                data: {
                                    labels: [
                                        'Cartão',
                                        'Dinheiro',
                                    ],
                                    datasets: [{
                                        label: 'Vendas (em reais)',
                                        data: ['<?php echo $cartao?>', '<?php echo $dinheiro?>'],
                                        backgroundColor: [
                                            'rgba(4,16,30,0.8)',
                                            'rgba(248,189,9,0.8)',
                                        ],
                                        borderColor: [
                                            'rgb(255,192,0)',
                                            'rgba(4,16,30)',

                                        ]
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>


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
                    <input type="text" class="inputzz" name="nomeProprietario" id="nomeProprietario">
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
                    <input type="text" name="nomeEditProprietario" id="nomeEditProprietario" class="inputzz">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-primary" id="btnEditProprietario">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal de Delete de PROPRIETÁRIO -->
<div class="modal fade" id="deleteProprietario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5 " id="exampleModalLabel">Deletar Proprietário</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" name="frmDeleteProprietario" id="frmDeleteProprietario">
                <div class="modal-body">
                    <input type="text" name="idDeleteProprietario" id="idDeleteProprietario" hidden="hidden">
                    <div class="alert alert-danger">
                        Tem certeza?
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
                                <input type="text" name="inpNome" id="inpNome" class="inputzz" required="required">
                            </div>
                            <div>
                                <label for="inpContato" class="label-control">Contato:</label>
                                <input type="text" name="inpContato" id="inpContato" class="inputzz telefoneBR">
                            </div>
                            <div>
                                <label for="inpValorUnitario" class="label-control">Número do cartão:</label>
                                <input type="number" name="inpValorUnitario" id="inpValorUnitario" minlength="6"
                                       maxlength="6"
                                       class="inputzz cartao">
                            </div>
                            <div>
                                <label for="inpValorCartao" class="label-control">Valor em cartão:</label>
                                <input type="text" name="inpValorCartao" id="inpValorCartao"
                                       class="inputzz">
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
            <form method="post" action="" name="frmEditCliente" id="frmEditCliente">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <input type="text" id="inpEditId" name="inpEditId" hidden="hidden">
                            <div>
                                <label for="inpEditNome" class="label-control">Nome:</label>
                                <input type="text" name="inpEditNome" id="inpEditNome" class="inputzz"
                                       required="required">
                            </div>
                            <div>
                                <label for="inpEditContato" class="label-control">Contato:</label>
                                <input type="text" name="inpEditContato" id="inpEditContato"
                                       class="inputzz telefoneBR">
                            </div>
                            <div>
                                <label for="inpEditValorUnitario" class="label-control">Número do cartão:</label>
                                <input type="number" name="inpEditValorUnitario" id="inpEditValorUnitario" minlength="6"
                                       maxlength="6"
                                       class="inputzz cartao">
                            </div>
                            <div>
                                <label for="inpEditValorCartao" class="label-control">Valor em cartão:</label>
                                <input type="text" name="inpEditValorCartao" id="inpEditValorCartao"
                                       class="inputzz"">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-primary" id="btnEditCliente">Alterar</button>
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
                <h1 class="modal-title fs-5 " id="exampleModalLabel">Deletar cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" name="frmDeleteCliente" id="frmDeleteCliente">
                <div class="modal-body">
                    <input type="hidden" name="idDeleteCliente" id="idDeleteCliente">
                    <div class="alert alert-danger">
                        Tem certeza?
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
                        <input type="text" name="nomeAdm" id="nomeAdm" required="required" class="inputzz">
                    </div>
                    <div>
                        <label for="cpfAdm">CPF:</label>
                        <input type="text" name="cpfAdm" id="cpfAdm" class="cpf inputzz" autocomplete="off"
                               required="required">
                    </div>
                    <div>
                        <label for="senhaAdm">Senha:</label>
                        <input type="password" name="senhaAdm" id="senhaAdm" class="inputzz" autocomplete="off"
                               required="required">
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
                        <label for="nomeEditAdm">Nome:</label>
                        <input type="text" name="nomeEditAdm" id="nomeEditAdm" required="required" class="inputzz">
                    </div>
                    <div>
                        <label for="cpfEditAdm">CPF:</label>
                        <input type="text" name="cpfEditAdm" id="cpfEditAdm" class="cpf inputzz" autocomplete="off"
                               required="required">
                    </div>
                    <div>
                        <label for="senhaEditAdm">Senha:</label>
                        <input type="password" name="senhaEditAdm" id="senhaEditAdm" class="inputzz" autocomplete="off"
                               required="required">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-primary" id="btnEditAdm">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal de Delete de ADM -->
<div class="modal fade" id="deleteAdm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header  bg-danger text-light">
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
                                <label for="inpNomeCarro" class="label-control">Nome:</label>
                                <input type="text" name="inpNomeCarro" id="inpNomeCarro" class="inputzz"
                                       required="required">
                            </div>
                            <div>
                                <label for="inpDiferenciais" class="label-control">Diferenciais:</label>
                                <input type="text" name="inpDiferenciais" id="inpDiferenciais" required="required"
                                       class="inputzz">
                            </div>
                            <div>
                                <label for="inpFotoCarro" class="label-control">Foto:</label>
                                <input type="file" name="inpFotoCarro" id="inpFotoCarro" class="form-control"
                                       required="required">
                            </div>
                            <div>
                                <label for="inpValor">Valor:</label>
                                <input type="text" name="inpValor" id="inpValor" required="required" class="inputzz">
                            </div>
                            <div>
                                <label for="selectProprietario">Selecione o proprietário:</label>
                                <select name="selectProprietario" id="selectProprietario" required="required"
                                        class="inputzz">
                                    <option selected>Selecione uma opção</option>
                                    <?php
                                    $proprietarios = listarTabela('*', 'proprietario');
                                    if ($proprietarios !== 'Vazio') {
                                        foreach ($proprietarios as $proprietario) {
                                            $id = $proprietario->idproprietario;
                                            $nome = $proprietario->nomeProprietario;
                                            $nome = mb_strtolower($nome);
                                            $nome = converterAcentuacao($nome);
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
                    <button type="submit" class="btn btn-success" id="btnCadCarro">Cadastrar</button>
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
                            <input type="hidden" name="idEditCarro" id="idEditCarro">
                            <div>
                                <label for="inpNomeEditCarro" class="label-control">Nome:</label>
                                <input type="text" name="inpNomeEditCarro" id="inpNomeEditCarro" class="inputzz"
                                       required="required">
                            </div>
                            <div>
                                <label for="inpEditDiferenciais">Diferenciais:</label>
                                <input type="text" name="inpEditDiferenciais" id="inpEditDiferenciais"
                                       required="required" class="inputzz">
                            </div>

                            <div>
                                <label for="inpEditValor">Valor:</label>
                                <input type="text" name="inpEditValor" id="inpEditValor" required="required"
                                       class="inputzz">
                            </div>
                            <div>
                                <label for="selectEditProprietario">Selecione o proprietário:</label>
                                <select name="selectEditProprietario" id="selectEditProprietario" required="required"
                                        class="inputzz">
                                    <option selected>Selecione uma opção</option>
                                    <?php
                                    $proprietarioss = listarTabela('*', 'proprietario');
                                    if ($proprietarioss !== 'Vazio') {
                                        foreach ($proprietarioss as $proprietario) {
                                            $id = $proprietario->idproprietario;
                                            $nome = $proprietario->nomeProprietario;
                                            $nome = mb_strtolower($nome);
                                            $nome = converterAcentuacao($nome);
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
                    <button type="submit" class="btn btn-primary" id="btnEditCarro">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Modal de apagar carro-->
<div class="modal fade" id="mdlDeleteCarro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header  bg-danger text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar carro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" name="frmDeleteCarro" id="frmDeleteCarro">
                <div class="modal-body">
                    <input type="hidden" name="idDeleteCarro" id="idDeleteCarro">
                    <div class="alert alert-danger">
                        Tem certeza?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-outline-danger" id="btnDeleteCarro">Deletar</button>
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
                                <div>
                                    <label for="inpGrupo" class="label-control">Selecione o grupo:</label>
                                    <select name="inpGrupo" id="inpGrupo" required="required" class="inputzz">
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
                                    <input type="file" name="inpFoto" id="inpFoto" class="form-control"
                                           required="required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                        <button type="submit" class="btn btn-success" id="btnCadFoto">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Modal de edição de foto-->
<div class="modal fade" id="mdlEditFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Foto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="" name="frmEditFoto" id="frmEditFoto">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <input type="hidden" name="idEditFoto" id="idEditFoto">
                                <div>
                                    <label for="inpEditGrupo" class="label-control">Selecione o grupo:</label>
                                    <select name="inpEditGrupo" id="inpEditGrupo" class="inputzz"
                                            required="required">
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
                                    <label for="inpEditFoto" class="label-control">Foto:</label>
                                    <input type="file" name="inpEditFoto" id="inpEditFoto" class="form-control"
                                           required="required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                        <button type="submit" class="btn btn-primary" id="btnEditFoto">Alterar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Modal de apagar de FOTO-->
<div class="modal fade" id="mdlDeleteFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header  bg-danger text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Apagar foto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" name="frmDeleteFoto" id="frmDeleteFoto">
                <div class="modal-body">
                    <input type="hidden" name="idDeleteFoto" id="idDeleteFoto">
                    <div class="alert alert-danger">
                        Tem certeza que deseja apagar essa foto?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-outline-danger" id="btnDeleteFoto">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal de deletar Venda-->
<div class="modal fade" id="mdlDeleteVenda" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header  bg-danger text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Apagar venda</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" name="frmDeleteVenda" id="frmDeleteVenda">
                <div class="modal-body">
                    <input type="text" name="idDeleteVenda" id="idDeleteVenda" hidden="hidden">
                    <div class="alert alert-danger">
                        Tem certeza?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-outline-danger" id="btnDeleteVenda">Deletar</button>
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
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"
        integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./js/mobile-navbar.js"></script>
<script src="./js/script.js"></script>
<script src="./js/funcoes.js"></script>

</body>

</html>