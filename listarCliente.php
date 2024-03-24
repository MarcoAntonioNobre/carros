<div class="tableEnfeite espaco fs-3">
    # Cliente
    <button class="btn btn-outline-dark" data-bs-toggle="modal"
            onclick="abrirModalJsCliente('nao', 'nao', 'nao', 'nao', '<?php echo DATATIMEATUAL ?>','nao','nao','nao','nao','nao','nao', 'mdlCadCliente','A', 'btnCadCliente', 'addCliente', 'inpNome', 'nao', 'frmCadCliente')">
        Cadastrar
    </button>
</div>
<div class="">
    <?php
    $listarCliente = listarTabela('*', 'cliente');

    if ($listarCliente !== 'Vazio') {
    ?>
    <table class="table table-striped table-hover text-center">
        <thead>
        <tr>
            <th scope="col" class="bg-black text-light legenda">#</th>
            <th scope="col" class="bg-black text-light legenda">Nome</th>
            <th scope="col" class="bg-black text-light legenda">Contato</th>
            <th scope="col" class="bg-black text-light legenda">Número do cartão</th>
            <th scope="col" class="bg-black text-light legenda">Valor no cartão</th>
            <th scope="col" class="bg-black text-light legenda">Ações</th>
        </tr>
        </thead>
        <tbody>


        <?php
        $cont = 1;
        foreach ($listarCliente as $cliente) {
            $idcliente = $cliente->idcliente;
            $nome = $cliente->nomeCliente;
            $contato = $cliente->contato;
            $cartao = $cliente->valorCartao;
            $numCartao = $cliente->numeroCartao;
            $nome = mb_strtolower($nome);
            $nome = converterAcentuacao($nome);
            ?>
            <tr>
                <th scope="row"><?php echo $cont; ?></th>
                <td>
                    <?php
                    if ($nome !== '') {
                        echo $nome;
                    } else {
                        echo 'Não informado';
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($contato !== '') {
                        echo $contato;
                    } else {
                        echo 'Não informado';
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($numCartao !== '') {
                        echo $numCartao;
                    } else {
                        echo 'Não informado';
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $valorNoCartao = conversorDBNum($cartao);
                    if ($valorNoCartao !== '') {
                        echo 'R$ ' . $valorNoCartao;
                    } else {
                        echo 'Sem limite';
                    }
                    ?>
                </td>
                <td>
                    <button name="alterarCliente" id="alterarCliente" class="btn btn-outline-success"
                            data-bs-toggle="modal" data-bs-target="#vermais<?php echo $idcliente ?>">
                        Ver mais
                    </button>
                    <!--Modal de ver mais de CLIENTE-->
                    <div class="modal fade" id="vermais<?php echo $idcliente ?>" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cliente <?php echo $nome ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body vermaisTabela">
                                    <div>
                                        <div class="text-start">
                                            <b>Nome:</b> <?php echo $nome; ?>
                                        </div>
                                        <hr>
                                        <div class="text-start">
                                            <b>Contato:</b>
                                            <?php
                                            if ($contato !== '') {
                                                echo $contato;
                                            } else {
                                                echo 'Não informado';
                                            }
                                            ?>
                                        </div>
                                        <hr>
                                        <div class="text-start">
                                            <b>Número do cartão:</b> <?php echo $numCartao; ?>
                                        </div>
                                        <hr>
                                        <div class="text-start">
                                            <b>Valor no cartão:</b>
                                            <?php
                                            $valorNoCartao = conversorDBNum($cartao);
                                            if ($valorNoCartao !== '') {
                                                echo 'R$ ' . $valorNoCartao;
                                            } else {
                                                echo 'Sem limite';
                                            }
                                            ?>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="mt-4">
                                        <div class="text-start">
                                            <h5>Histórico</h5>
                                            <hr>

                                            <table class="table vermaisTabela">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Carro</th>
                                                    <th scope="col">Quantidade</th>
                                                    <th scope="col">Valor pago</th>
                                                </tr>
                                                </thead>
                                                <tbody class="vermaisTabela">
                                                <?php
                                                $contaHistorico = 1;
                                                $lista = listarTabelaInnerJoinTriploWhere('*', 'compras', 'cliente', 'carro', 'idcliente', 'idcliente', 'idcarro', 'idcarro', 'idcliente', "$idcliente", 'idcliente', 'DESC');
                                                if ($lista !== 'Vazio') {
                                                    foreach ($lista as $historico) {
                                                        $nomeCarro = $historico->nomeCarro;
                                                        $qtd = $historico->qtdComprada;
                                                        $valorPago = $historico->valorPago;
                                                        ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $contaHistorico ?></th>
                                                            <td><?php echo $nomeCarro ?></td>
                                                            <td><?php echo $qtd ?></td>
                                                            <td><?php echo $valorPago ?></td>
                                                        </tr>
                                                        <?php
                                                        ++$contaHistorico;
                                                    }
                                                } else {
                                                    ?>
                                                    }
                                                    <tr>
                                                        <th scope="row" class="text-center" colspan="4">Nenhum dado
                                                            encontrado!
                                                        </th>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar
                                    </button>
                                    <!--                                    <button type="button" class="btn btn-primary">Save changes</button>-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <button name="alterarCliente" id="alterarCliente" class="btn btn-outline-primary"
                            data-bs-toggle="modal"
                            onclick="abrirModalJsCliente('<?php echo $idcliente ?>', 'inpEditId', '<?php echo $nome ?>', 'inpEditNome', '<?php echo DATATIMEATUAL ?>','<?php echo $contato ?>','inpEditContato','<?php echo $numCartao ?>','inpEditValorUnitario','<?php echo $cartao ?>','inpEditValorCartao', 'mdlEditCliente','A', 'btnEditCliente', 'editCliente', 'inpEditNome', 'nao', 'frmEditCliente')">
                        Alterar
                    </button>
                    <button name="excluirCliente" id="vermaisCliente" class="btn btn-outline-danger"
                            data-bs-toggle="modal"
                            onclick="abrirModalJsCliente('<?php echo $idcliente ?>', 'idDeleteCliente', 'nao', 'nao', 'nao','nao','nao','nao','nao','nao','nao', 'mdlDeleteCliente','A', 'btnDeleteCliente', 'deleteCliente', 'nao', 'nao', 'frmDeleteCliente')">
                        Excluir
                    </button>
                </td>
            </tr>
            <?php
            ++$cont;
        }
        } else {
            ?>
            <div style="display: flex;justify-content: center;align-items: center; min-height: 95vh !important;">
                <h1>Página Vazia.</h1>
                <img src="./img/vazio.gif" alt="ERROR 404">
            </div>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
