<div class="card mt-3">
    <div class="card-header espaco fs-3">
        # Fotos
        <button class="btn btn-outline-dark" data-bs-toggle="modal"
                onclick="abrirModalJsFoto('nao', 'nao', 'nao', 'nao','nao', 'nao' ,'inpFoto', '<?php echo DATATIMEATUAL ?>', 'mdlCadFoto', 'A', 'btnCadFoto', 'addFoto', 'nao', 'nao', 'frmCadFoto')">
            Cadastrar
        </button>
    </div>
    <div class=" card-body">
        <table class="table table-striped table-hover">
            <thead>
            <tr class="text-center ">
                <th scope="col" class="bg-black text-light legenda">#</th>
                <th scope="col" class="bg-black text-light legenda">Proprietário</th>
                <th scope="col" class="bg-black text-light legenda">Carro</th>
                <th scope="col" class="bg-black text-light legenda">Foto</th>
                <th scope="col" class="bg-black text-light legenda">Ação</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $contar = 1;
            $foto = listarTabelaInnerJoinTriplo('*', 'foto', 'carro', 'proprietario', 'idcarro', 'idcarro', 'idproprietario', 'idproprietario', 'idfoto', 'desc');
            if ($foto !== 'Vazio') {

                foreach ($foto as $fotos) {
                    $id = $fotos->idfoto;
                    $nomeCarro = $fotos->nomeCarro;
                    $nomeProp = $fotos->nomeProprietario;
                    $foto = $fotos->foto;
                    ?>
                    <tr class="text-center">
                        <th scope="row">
                            <?php
                            echo $contar;
                            ?>
                        </th>
                        <th>
                            <?php
                            echo $nomeCarro;
                            ?>
                        </th>
                        <td>
                            <?php
                            echo $nomeProp;
                            ?>
                        </td>
                        <td>
                            <?php echo $id ?>
                            <img src="./img/<?php echo $foto; ?>" alt="<?php echo $nomeCarro; ?>"
                                 title="<?php echo $nomeCarro; ?>" width="50px">
                        </td>
                        <td>
                            <button class="btn btn-outline-primary" data-bs-toggle="modal" onclick="abrirModalEditFoto(<?php echo $id;?>)">
                                Alterar
                            </button>


                            <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                    onclick='abrirModalDelFoto(<?php echo $id ?>)'>
                                Excluir
                            </button>
                            <!--                            <button class="btn btn-outline-danger" data-bs-toggle="modal"-->
                            <!--                                    onclick="deletar('deleteFoto',<?php //echo $id ?>
                            )">
                             Excluir
                            </button> -->
                        </td>
                    </tr>

                    <?php
                    ++$contar;
                }
            } else {
                ?>
                <div style="display: flex;justify-content: center;align-items: center; min-height: 95vh !important;">
                    <h1>Página Vazia, Retorne. </h1>
                    <img src="./img/vazio.gif" alt="ERROR 404">
                </div>
                <?php
            }

            ?>

            </tbody>
        </table>
    </div>
</div>