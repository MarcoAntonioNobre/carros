<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");

?>
<div class="card mt-5">
    <div class="card-header espaco fs-3">
        # Cliente
        <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#cadCliente">Cadastrar</button>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col" class="bg-black text-light legenda">#</th>
                <th scope="col" class="bg-black text-light legenda">Nome</th>
                <th scope="col" class="bg-black text-light legenda">Contato</th>
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
                    $nome = $cliente->nome;
                    $contato = $cliente->contato;
                    $cartao = $cliente->cartao;
                    ?>
                    <tr>
                        <th scope="row"><?php echo $cont; ?></th>
                        <td><?php echo $nome; ?></td>
                        <td><?php echo $contato; ?></td>
                        <td><?php echo $cartao; ?></td>
                        <td>
                            <button name="vermaisCliente" id="vermaisCliente" class="btn btn-outline-dark">Ver mais</button>
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

