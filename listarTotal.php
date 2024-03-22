<!--<div class="card mt-3">-->
<!---->
<!---->
<!--    </div>-->
<!--</div>-->


<div class="tableEnfeite espaco fs-3">
    # Total de vendas
</div>

<div class="">
    <?php
    $contar = 1;
    $grupos = listarTabela('*', 'proprietario');
    $RODARODA = 1;
    $RODARODAnome = 1;
    $mario = 0;
    if ($grupos !== 'Vazio') {
    ?>
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
        foreach ($grupos as $grupo) {
        $id = $grupo->idproprietario;
        $nome = $grupo->nomeProprietario;

        ?>
        <tr class="text-center">

            <?php
            $total = listarTabelaInnerJoinTriploValorPago('valorPago', 'carro', 'proprietario', 'compras', 'idproprietario', 'idproprietario', 'idcarro', 'idcarro', 't.idcarro', $RODARODA);
            foreach ($total as $to) {
                $testando2 = $to->soma;
                $marioMaior[] = $testando2;
                ++$RODARODA;
            }
            }

            arsort($marioMaior);
            foreach ($marioMaior as $ordem => $val) {
            ?>

            <th scope="row" class="text-center">
                <?php
                echo $contar
                ?>
            </th>
            <td class="text-center">
                <?php
                $idpessoa = $ordem;
                $idpessoa = $idpessoa + 1;
                $pessoaUnica = listarItemExpecificoPessoa($idpessoa);
                foreach ($pessoaUnica as $pessoas) {
                    $nomePessoa = $pessoas->nomeProprietario;
                    echo $nomePessoa;
                }
                ?>
            </td>
            <td class="text-center dinheiro">

                <?php
                $val = conversorDBNum($val);
                echo 'R$ ' . $val;
                ?>

            </td>
        </tr>
        <?php

        ++$contar;
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





<!--SELECT sum(c.valorPago) FROM carro t-->
<!--INNER JOIN proprietario y-->
<!--ON t.idproprietario = y.idproprietario-->
<!--inner JOIN compras c-->
<!--ON t.idcarro = c.idcarro-->
<!--where y.idproprietario = 4-->



