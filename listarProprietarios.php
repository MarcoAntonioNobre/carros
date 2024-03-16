<div class="card mt-3">
    <div class="card-header espaco fs-3">
        # Proprietários
        <button class="btn btn-outline-dark" data-bs-toggle="modal" onclick="abrirModalJsProprietario('nao','nao','nao','nao','nao','nao','nao','nao', 'cadProprietario','A', 'btnAddProprietario', 'addProprietario', 'nomeProprietario', 'nao', 'frmAddProprietario')">
            Cadastrar
        </button>

    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="bg-black text-light legenda">#</th>
                    <th scope="col" class="bg-black text-light legenda">Foto</th>
                    <th scope="col" class="bg-black text-light legenda">Nome</th>
                    <th scope="col" class="bg-black text-light legenda">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $proprietarios = listarTabela('*', 'proprietario', 'nomeProprietario');
                if ($proprietarios !== 'Vazio') {
                    $cont = 1;
                    foreach ($proprietarios as $proprietario) {
                        $idprop = $proprietario -> idproprietario;
                        $nome = $proprietario->nomeProprietario;
                ?>


                        <tr>
                            <th scope="row"><?php echo $cont; ?></th>
                            <td>foto</td>
                            <td><?php echo $nome; ?></td>
                            <td>
                                <button class="btn btn-outline-dark">Ver Mais</button>
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" onclick="abrirModalJsProprietario('<?php echo $idprop; ?>', 'idEditProprietario', '<?php echo $nome; ?>', 'nomeEditProprietario', 'nao', 'contatoEditProprietario', 'nao', 'nao', 'editProprietario', 'A', 'btnEditProprietario', 'editProprietario', 'nomeEditProprietario',' <?php echo $nome; ?>', 'frmEditProprietario')">Alterar</button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" onclick="abrirModalJsProprietario('<?php echo $idprop; ?>', 'idDeleteProprietario', 'nao', 'nao', 'nao', 'nao', 'nao', 'nao', 'deleteProprietario', 'A', 'btnDeleteProprietario', 'deleteProprietario', 'nao', 'nao', 'frmDeleteProprietario')">Deletar</button>

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