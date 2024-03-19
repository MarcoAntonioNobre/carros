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
            $teste = teste("SELECT idproprietario, COUNT(idproprietario) FROM compras GROUP BY idcarro");

            if ($teste !== 'Vazio') {

                foreach ($teste as $testeItem) {
                    $idprop = $testeItem->idproprietario;

//                    $cpf = $testeItem->;

                    ?>
                    <tr class="text-center">
                        <th scope="row"><?php echo $contar
                            ?></th>
                        <td><?php
                            $prop = listarTabela('*','proprietario');
                            foreach($prop as $proprie){
                                $id = $proprie->idproprietario;
                                if($id === $idprop){
                                    $grupo = $proprie->nomeProprietario;
                                }
                            }
                            echo $grupo;
                            ?></td>
                        <td><?php echo $cpf
                            ?></td>
                    </tr>

                    <?php
                    ++$contar;
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

