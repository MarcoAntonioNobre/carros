<div class="tableEnfeite espaco fs-3">
    # Proprietários
    <button class="btn btn-outline-dark" data-bs-toggle="modal"
            onclick="abrirModalJsProprietario('nao','nao','nao','nao','<?php echo DATATIMEATUAL ?>', 'cadProprietario','A', 'btnAddProprietario', 'addProprietario', 'nomeProprietario', 'nao', 'frmAddProprietario')">
        Cadastrar
    </button>

</div>
<div class="card-body">
    <?php
    $proprietarios = listarTabela('*', 'proprietario', 'nomeProprietario');
    if ($proprietarios !== 'Vazio') {

    ?>
    <table class="table text-center table-striped table-hover">
        <thead>
        <tr>
            <th scope="col" class="bg-black text-light legenda">#</th>
            <th scope="col" class="bg-black text-light legenda">Nome</th>
            <th scope="col" class="bg-black text-light legenda">Ações</th>
        </tr>
        </thead>
        <tbody>


        <?php
        $cont = 1;
        foreach ($proprietarios as $proprietario) {
            $idprop = $proprietario->idproprietario;
            $nome = $proprietario->nomeProprietario;
            $nome = mb_strtolower($nome);
            $nome = converterAcentuacao($nome);

            ?>


            <tr>
                <th scope="row"><?php echo $cont; ?></th>
                <td><?php echo $nome; ?></td>
                <td>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                            onclick="abrirModalJsProprietario('<?php echo $idprop; ?>', 'idEditProprietario', '<?php echo $nome; ?>', 'nomeEditProprietario', '<?php echo DATATIMEATUAL ?>', 'editProprietario', 'A', 'btnEditProprietario', 'editProprietario', 'nomeEditProprietario',' <?php echo $nome; ?>', 'frmEditProprietario')">
                        Alterar
                    </button>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                            onclick="abrirModalJsProprietario('<?php echo $idprop; ?>', 'idDeleteProprietario', 'nao', 'nao','<?php echo DATATIMEATUAL ?>', 'deleteProprietario', 'A', 'btnDeleteProprietario', 'deleteProprietario', 'nao', 'nao', 'frmDeleteProprietario')">
                        Deletar
                    </button>

                </td>
            </tr>

            <?php
            ++$cont;
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