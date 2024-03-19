<div class="card mt-3">
    <div class="card-header espaco fs-3">
        # Cliente
        <button class="btn btn-outline-dark" data-bs-toggle="modal" onclick="abrirModalJsCliente('nao', 'nao', 'nao', 'nao', '<?php echo DATATIMEATUAL?>','nao','nao','nao','nao','nao','nao', 'mdlCadCliente','A', 'btnCadCliente', 'addCliente', 'inpNome', 'nao', 'frmCadCliente')">Cadastrar</button>
    </div>
    <div class="card-body">
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
            $listarCliente = listarTabela('*', 'cliente');

            if ($listarCliente !== 'Vazio') {
                $cont = 1;
                foreach ($listarCliente as $cliente) {
                    $idcliente = $cliente-> idcliente;
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
                            if($nome !== ''){
                                echo $nome;
                            }else{
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
                        <td >
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
                            if ($cartao !== '') {
                                echo 'R$ '.$cartao;
                            } else {
                                echo 'Sem limite';
                            }
                            ?>
                        </td>
                        <td>
                            <button name="alterarCliente" id="alterarCliente" class="btn btn-outline-primary" data-bs-toggle="modal" onclick="abrirModalJsCliente('<?php echo $idcliente?>', 'inpEditId', '<?php echo $nome?>', 'inpEditNome', '<?php echo DATATIMEATUAL?>','<?php echo $contato?>','inpEditContato','<?php echo $valorUni?>','inpEditValorUnitario','<?php echo $cartao?>','inpEditValorCartao', 'mdlEditCliente','A', 'btnEditCliente', 'editCliente', 'inpEditNome', 'nao', 'frmEditCliente')">Alterar</button>
                            <button name="excluirCliente" id="vermaisCliente" class="btn btn-outline-danger" data-bs-toggle="modal" onclick="abrirModalJsCliente('<?php echo $idcliente?>', 'idDeleteCliente', 'nao', 'nao', 'nao','nao','nao','nao','nao','nao','nao', 'mdlDeleteCliente','A', 'btnDeleteCliente', 'deleteCliente', 'nao', 'nao', 'frmDeleteCliente')">Excluir</button>
                        </td>
                    </tr>
                    <?php
                    ++$cont;
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
            </tbody>
        </table>
    </div>
</div>

