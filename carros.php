<!--<div class="card mt-3">-->
<!--   -->
<!--    <div class="card-body">-->
<!--       -->
<!--    </div>-->
<!--</div>-->

<div class="espaco fs-3 tableEnfeite">
    #Carros
    <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#mdlCadCarro">Cadastrar</button>
</div>
<div>
    <?php
    $contar = 1;
    $carros = listarTabelaInnerJoin('*', 'carro', 'proprietario', 'idproprietario', 'idproprietario', 'nomeCarro', 'ASC');

    if ($carros !== 'Vazio') {
    ?>

    <table class="table table-striped table-hover">
        <thead>
        <tr class="text-center ">
            <th scope="col" class="bg-black text-light legenda">#</th>
            <th scope="col" class="bg-black text-light legenda">Foto</th>
            <th scope="col" class="bg-black text-light legenda">Proprietário</th>
            <th scope="col" class="bg-black text-light legenda">Carro</th>
            <th scope="col" class="bg-black text-light legenda">Valor</th>
            <th scope="col" class="bg-black text-light legenda">Ações</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($carros as $carro) {
            $idcarro = $carro->idcarro;
            $proprietario = $carro->nomeProprietario;
            $nomeCarro = $carro->nomeCarro;
            $diferenciais = $carro->diferenciais;
            $valor = $carro->preco;
            $foto = $carro->fotoPerfil;
            $nomeCarro = mb_strtolower($nomeCarro);
            $nomeCarro = converterAcentuacao($nomeCarro);
            ?>
            <tr class="text-center">
                <th scope="row"><?php echo $contar
                    ?></th>
                <td>
                    <img src="./img/<?php echo $foto?>" alt="<?php echo $nomeCarro?>" title="<?php echo $nomeCarro?>" width="50px">

                </td>
                <td><?php echo $proprietario
                    ?></td>
                <td><?php echo $nomeCarro
                    ?></td>
                <td>
                    <?php
                    $preco = conversorDBNum($valor);
                    echo $preco;
                    ?>
                </td>
                <td>
                    <button class="btn btn-outline-primary" onclick="abrirModalCarro('<?php echo $idcarro?>','<?php echo $nomeCarro?>','<?php echo $diferenciais?>','<?php echo $valor?>','<?php echo $proprietario?>')">Alterar</button>
                    <button class="btn btn-outline-danger" onclick="abrirModalDeleteCarro(<?php echo $idcarro?>)">Excluir</button>
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
</div>
