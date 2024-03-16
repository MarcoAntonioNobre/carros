<div class="card mt-3">
    <div class="card-header espaco fs-3">
        # Cliente
        <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#mdlCadCliente">Cadastrar</button>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col" class="bg-black text-light legenda">#</th>
                <th scope="col" class="bg-black text-light legenda">Nome</th>
                <th scope="col" class="bg-black text-light legenda">Contato</th>
                <th scope="col" class="bg-black text-light legenda">Preço da unidade</th>
                <th scope="col" class="bg-black text-light legenda">Cartão</th>
                <th scope="col" class="bg-black text-light legenda">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $listarCliente = listarTabela('*', 'cliente');

            if ($listarCliente !== 'Vazio') {
                $cont = 1;
                foreach ($listarCliente as $cliente) {
                    $nome = $cliente->nomeCliente;
                    $contato = $cliente->contato;
                    $cartao = $cliente->valorCartao;
                    $valorUni = $cliente->valorUnitario;
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
                        <td>
                            <?php
                            if ($cartao !== '') {
                                echo $cartao;
                            } else {
                                echo 'Não informado';
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($valorUni !== '') {
                                echo $valorUni;
                            } else {
                                echo 'Não informado';
                            }
                            ?>
                        </td>
                        <td>
                            <button name="vermaisCliente" id="vermaisCliente" class="btn btn-outline-dark">Ver mais</button>
                            <button name="alterarCliente" id="alterarCliente" class="btn btn-outline-primary">Alterar</button>
                            <button name="excluirCliente" id="vermaisCliente" class="btn btn-outline-danger">Excluir</button>
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

