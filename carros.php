<table class="table table-striped table-hover">
    <thead >
    <tr class="text-center ">
        <th scope="col" class="bg-black text-light legenda">#</th>
        <th scope="col" class="bg-black text-light legenda">Proprietário</th>
        <th scope="col" class="bg-black text-light legenda">Carro</th>
        <th scope="col" class="bg-black text-light legenda">Valor</th>
        <th scope="col" class="bg-black text-light legenda">Ação</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $contar = 1;
    $carros = listarTabelaInnerJoin('*', 'carro', 'proprietario', 'idproprietario', 'idproprietario', 'carro', 'ASC');

    if ($carros !== 'Vazio') {

        foreach ($carros as $carro) {
            $proprietario = $carro->nome;
            $idcarro = $carro->idcarro;
            $foto = $carro->foto;
            $nomeCarro = $carro->carro;
            $modelo = $carro->modelo;
            $valor = $carro->valor;
            $valor = conversorDBNum($valor);
            ?>
            <tr class="text-center">
                <th scope="row"><?php echo $contar ?></th>
                <td><?php echo $proprietario ?></td>
                <td><?php echo $nomeCarro ?></td>
                <td>R$ <?php echo $valor ?></td>
                <td><button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#verMais<?php echo $contar?>">Ver Mais</button></td>
            </tr>

            <div class="modal fade" id="verMais<?php echo $contar?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header  text-white bg-primary">
                            <h1 class="modal-title fs-5 text-center" id="nomeCarroModal"><?php echo $nomeCarro ?> - <?php echo $proprietario ?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php echo $proprietario ?>
                        </div>
                        <div class="modal-footer">
                        <h4>R$<?php echo $valor ?></h4>
                            <button type="button" class="btn btn-outline-success" onclick="">Comprar</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            ++$contar;
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