<div class="tableEnfeite espaco fs-3">
    # Vendas
    <div class="d-flex justify-content-end align-items-center">
        <button class="btn btn-outline-warning text-black" onclick="imprimir('Vendas','vendas')"><i class="bi bi-printer"></i></button>
    </div>
</div>
<div class="card-body">
    <?php
    $listarVenda = listarTabelaInnerJoin('*', 'compras', 'carro', 'idcarro', 'idcarro', 't.idcompras', 'DESC');

    if ($listarVenda !== 'Vazio') {
    $cont = 1;
    ?>
    <div id="vendas" class="mb-3">
        <table class="table table-striped table-hover text-center">
            <thead>
            <tr>
                <th scope="col" class="bg-black text-light legenda">#</th>
                <th scope="col" class="bg-black text-light legenda">Carro</th>
                <th scope="col" class="bg-black text-light legenda">Valor do veículo</th>
                <th scope="col" class="bg-black text-light legenda">Forma de Pagamento</th>
                <th scope="col" class="bg-black text-light legenda">Quantidade comprada</th>
                <th scope="col" class="bg-black text-light legenda">Valor pago</th>
                <!--                <th scope="col" class="bg-black text-light legenda">Ação</th>-->
            </tr>
            </thead>
            <tbody>


            <?php
            foreach ($listarVenda as $venda) {
                $id = $venda->idcompras;
                $nomeCarro = $venda->nomeCarro;
                $vlrUnidade = $venda->valorUnidade;
                $qtd = $venda->qtdComprada;
                $pgto = $venda->idcliente;
                $vlrPago = $venda->valorPago;
                $nomeCarro = mb_strtolower($nomeCarro);
                $nomeCarro = converterAcentuacao($nomeCarro);
                ?>
                <tr>
                    <th scope="row"><?php echo $cont; ?></th>
                    <td>
                        <?php
                        echo $nomeCarro;
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $vlrUnidade;
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($pgto == 'null') {
                            echo 'Dinheiro';
                        } else {
                            echo 'Cartão';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $qtd;
                        ?>
                    </td>
                    <td>
                        <?php
                        $vlrPago = conversorDBNum($vlrPago);
                        echo 'R$ ' . $vlrPago;
                        ?>
                    </td>
                    <!--<td>
                        <button name="excluirVenda" id="excluirVenda" class="btn btn-outline-danger"
                                data-bs-toggle="modal"
                                onclick="abrirModalJsVenda('<? php// echo $id ?>', 'idDeleteVenda', 'mdlDeleteVenda','nao','A', 'btnDeleteVenda', 'deleteVenda', 'nao', 'nao', 'frmDeleteVenda')">
                            Excluir
                        </button>
                    </td>-->
                </tr>
                <?php
                ++$cont;
            }
            } else {
                ?>
                <div style="display: flex;justify-content: center;align-items: center; min-height: 95vh !important;">
                    <h1>Página Vazia. </h1>
                    <img src="./img/vazio.gif" alt="ERROR 404">
                </div>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
