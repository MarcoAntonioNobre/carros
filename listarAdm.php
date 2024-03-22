
<div class="card mt-3">
    <div class="card-header espaco fs-3">
        # Administrador
        <button class="btn btn-outline-dark" data-bs-toggle="modal" onclick="abrirModalJsADM('nao', 'nao', 'nao', 'nao', '<?php echo DATATIMEATUAL?>','nao', 'nao','nao', 'nao', 'cadAdm','A', 'btnAddAdm', 'addAdm', 'nomeAdm', 'nao', 'frmAddAdm')">Cadastrar</button>
    </div>
    <div class="card-body">
        <?php
        $contar = 1;
        $adm = listarTabela('*', 'adm');
        if ($adm !== 'Vazio') {
        ?>

        <table class="table table-striped table-hover">
            <thead>
            <tr class="text-center ">
                <th scope="col" class="bg-black text-light legenda">#</th>
                <th scope="col" class="bg-black text-light legenda">Nome</th>
                <th scope="col" class="bg-black text-light legenda">CPF</th>
                <th scope="col" class="bg-black text-light legenda">Ações</th>
            </tr>
            </thead>
            <tbody>




            <?php
                foreach ($adm as $admin) {
                    $id = $admin->idadm;
                    $nome = $admin->nomeAdm;
                    $cpf = $admin->cpf;
                    $nome = mb_strtolower($nome);
                    $nome = converterAcentuacao($nome);
                    ?>
                    <tr class="text-center">
                        <th scope="row"><?php echo $contar
                            ?></th>
                        <td><?php echo $nome
                            ?></td>
                        <td><?php echo $cpf
                            ?></td>
                        <td>
                            <button class="btn btn-outline-primary" data-bs-toggle="modal" onclick="abrirModalJsADM('<?php echo $id?>', 'idEditAdm', '<?php echo $nome?>', 'nomeEditAdm','nao','<?php echo $cpf?>', 'cpfEditAdm','nao', 'senhaEditAdm', 'editAdm','A', 'btnEditAdm', 'editAdm', 'nomeEditAdm', 'nao', 'frmEditAdm')">Alterar</button>
                            <button class="btn btn-outline-danger" data-bs-toggle="modal" onclick="abrirModalJsADM('<?php echo $id?>', 'idDeleteAdm', 'nao', 'nao', 'nao','nao', 'nao', 'nao', 'nao', 'deleteAdm','A', 'btnDeleteAdm', 'deleteAdm', 'nao', 'nao', 'frmDeleteAdm')">Excluir</button>
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
</div>

