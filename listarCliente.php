<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");

?>
<div class="card">
    <div class="card-header">
        # Cliente
        <button data-bs-toggle="modal" data-bs-target="#mdlCadCliente">Cadastrar</button>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Contato</th>
                <th scope="col">Cartão</th>
                <th scope="col">Ações</th>
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
                            <button name="vermaisCliente" id="vermaisCliente" class="btn">Ver mais</button>
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

