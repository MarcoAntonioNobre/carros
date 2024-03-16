<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");
?>
<div class="card mt-5">
    <div class="card-header fs-3">
        # Cliente
        <button class="btn btn-outline-dark" data-bs-toggle="modal" onclick="abrirModalJsProprietario('nao','nao','nao','nao','nao','nao','nao','nao', 'cadProprietario','A', 'btnAddProprietario', 'addProprietario', 'nomeProprietario', 'nao', 'frmAddProprietario')">Cadastrar</button>

    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col" class="bg-black text-light legenda">#</th>
                <th scope="col" class="bg-black text-light legenda">Foto</th>
                <th scope="col" class="bg-black text-light legenda">Nome</th>
                <th scope="col" class="bg-black text-light legenda">Contato</th>
                <th scope="col" class="bg-black text-light legenda">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $proprietarios = listarTabela('*', 'proprietario', 'nome');
            if ($proprietarios !== 'Vazio') {
                $cont = 1;
                foreach ($proprietarios as $proprietario) {
                    $idprop = $proprietario->idproprietario;

                    $foto = $proprietario->foto;
                    $nome = $proprietario->nome;
                    $contato = $proprietario->contato;
                    ?>


                    <tr>
                        <th scope="row"><?php echo $cont; ?></th>
                        <td>foto</td>
                        <td><?php echo $nome; ?></td>
                        <td><?php echo $contato; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <button type="button" class="btn btn-outline-primary"  data-bs-toggle="modal" onclick="abrirModalJsProprietario('<?php echo $idprop;?>', 'idEditProprietario', '<?php echo $nome;?>', 'nomeEditProprietario', '<?php echo $contato ;?>', 'contatoEditProprietario', 'nao', 'nao', 'editProprietario', 'A', 'btnEditProprietario', 'editProprietario', 'nomeEditProprietario',' <?php echo $nome;?>', 'frmEditProprietario')">Editar</button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" onclick="abrirModalJsProprietario('<?php echo $idprop;?>', 'idDeleteProprietario', 'nao', 'nao', 'nao', 'nao', 'nao', 'nao', 'deleteProprietario', 'A', 'btnDeleteProprietario', 'deleteProprietario', 'nao', 'nao', 'frmDeleteProprietario')">Deletar</button>
                            </div>
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
