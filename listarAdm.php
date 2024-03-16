<div class="card mt-3">
    <div class="card-header espaco fs-3">
        #Administrador
        <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#mdlCadCarro">Cadastrar</button>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
            <tr class="text-center ">
                <th scope="col" class="bg-black text-light legenda">#</th>
                <th scope="col" class="bg-black text-light legenda">Nome</th>
                <th scope="col" class="bg-black text-light legenda">CPF</th>
                <th scope="col" class="bg-black text-light legenda">Ação</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $contar = 1;
            $adm = listarTabela('*', 'adm');

            if ($adm !== 'Vazio') {

                foreach ($adm as $admin) {
                    $id = $admin->idadm;
                    $nome = $admin->nomeAdm;
                    $cpf = $admin->cpf;
                    ?>
                    <tr class="text-center">
                        <th scope="row"><?php echo $contar
                            ?></th>
                        <td><?php echo $nome
                            ?></td>
                        <td><?php echo $cpf
                            ?></td>
                        <td>
                            <button class="btn btn-outline-dark">Ver Mais</button>
                            <button class="btn btn-outline-primary">Alterar</button>
                            <button class="btn btn-outline-danger">Excluir</button>
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

