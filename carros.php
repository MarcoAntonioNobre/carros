<div class="card mt-5">
    <div class="card-header fs-3">
        # Carros
        <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#cadCliente">Cadastrar</button>
    </div>
    <div class="card-body">

        <table class="table table-striped table-hover">
            <thead>
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

                        $idcarro = $carro->idcarro;
                        $proprietario = $carro->nome;
                        $foto = $carro->foto;
                        $nomeCarro = $carro->carro;
                        $modelo = $carro->modelo;
                        $valor = $carro->valor;
                ?>
                        <tr class="text-center">
                            <th scope="row"><?php echo $contar
                                            ?></th>
                            <td><?php echo $proprietario
                                ?></td>
                            <td><?php echo $nomeCarro
                                ?></td>
                            <td><?php echo $valor
                                ?></td>
                            <td><button class="btn btn-outline-dark">Ver Mais</button></td>
                        </tr>

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

    </div>
</div>