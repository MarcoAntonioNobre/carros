<div class="card mt-3">
    <div class="card-header espaco fs-3">
        # Total de vendas
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
            <tr class="text-center ">
                <th scope="col" class="bg-black text-light legenda">#</th>
                <th scope="col" class="bg-black text-light legenda">Grupo</th>
                <th scope="col" class="bg-black text-light legenda">Total de vendas</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $contar = 1;
            $grupos = listarTabela('*', 'proprietario');

            if ($grupos !== 'Vazio') {

                foreach ($grupos

                         as $grupo) {
                    $id = $grupo->idproprietario;
                    $nome = $grupo->nomeProprietario;

                    ?>
                    <tr class="text-center">
                    <th scope="row">
                        <?php
                        echo $contar
                        ?>
                    </th>
                    <td>
                        <?php
                        echo $nome
                        ?>
                    </td>
                    <td>
                    <?php
                    $vendas = listarTabela('*', 'compras');
                    foreach ($vendas

                             as $venda) {
                        $idcar = $venda->idcarro;
                        if ($idcar == $id) {
                            $total = soma("SUM(valorPago) as soma", 'compras', 'idcarro', $idcar);
                            foreach ($total as $to) {
                                $resultado = $to->soma;
                            }
                            echo 'R$ ' . $resultado;
                            ?>
                            </td>
                            </tr>
                            <?php
                            ++$contar;
                        }
                    }
                }
            } else {
                ?>
                <div style="display: flex;justify-content: center;align-items: center; min-height: 95vh !important;">
                    <h1>Página Vazia. </h1><sup>NOT FOUND</sup>
                    <img src="./img/vazio.gif" alt="ERROR 404">
                </div>
                <?php
            }

            ?>

            </tbody>
        </table>
    </div>
</div>

