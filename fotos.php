<div class="card mt-3">
    <div class="card-header espaco fs-3">
        # Fotos
        <button class="btn btn-outline-dark" data-bs-toggle="modal"
                onclick="abrirModalJsFoto('nao', 'nao', 'nao', 'nao','nao', 'nao' , '<?php echo DATATIMEATUAL ?>', 'mdlCadFoto', 'A', 'btnCadFoto', 'addFoto', 'nao', 'nao', 'frmCadFoto')">
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
                            <img src="./img/<?php echo $foto; ?>" alt="<?php echo $nomeCarro; ?>"
                                 title="<?php echo $nomeCarro; ?>" width="50px">
                        </td>
                        <td>
                            <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                    onclick="abrirModalEditFoto(<?php echo $id ?>)">
                                Alterar
                            </button>
                            <!--                            <button class="btn btn-outline-danger" data-bs-toggle="modal" onclick="abrirModalDelFoto(<?php //echo $id?>)">-->
                            <!--                            Excluir </button>-->
                            <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                    onclick="deletar('deleteFoto',<?php echo $id ?>)">
                                Excluir
                            </button>
                        </td>
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


<div class="modal fade" id="mdlEditFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Foto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="" name="frmEditFoto" id="frmEditFoto">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <input type="text" name="idEditFoto" id="idEditFoto">
                                <div>
                                    <label for="inpEditGrupo" class="label-control">Selecione o grupo:</label>
                                    <select name="inpEditGrupo" id="inpEditGrupo" required="required">
                                        <option selected>Selecione uma opção</option>
                                        <?php
                                        $proprietario = listarTabela('*', 'proprietario');
                                        if ($proprietario !== 'Vazio') {
                                            foreach ($proprietario as $proprietarios) {
                                                $id = $proprietarios->idproprietario;
                                                $nome = $proprietarios->nomeProprietario;
                                                ?>
                                                <option value="<?php echo $id ?>"><?php echo $nome ?></option>
                                                <?php
                                            }
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div>
                                    <label for="inpEditFoto" class="label-control">Foto:</label>
                                    <input type="file" name="inpEditFoto" id="inpEditFoto" class="form-control"
                                           required="required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                        <button type="submit" class="btn btn-primary" id="btnEditFoto">Alterar</button>
                    </div>
            </form>
        </div>
    </div>
</div>




<div class="modal fade" id="mdlDeleteFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Apagar foto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" name="frmDeleteFoto" id="frmDeleteFoto">
                    <input type="text" name="idDeleteFoto" id="idDeleteFoto">
                    <div class="alert alert-danger">
                        Tem certeza que deja apagar essa foto?
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                <button type="submit" class="btn btn-outline-danger" id="btnDeleteFoto">Deletar</button>
            </div>
            </form>
        </div>
    </div>
</div>