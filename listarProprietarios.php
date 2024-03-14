<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");
?>
<div class="card">
    <div class="card-header">
        # Cliente
        <button class="btn btn-success" data-bs-toggle="modal" onclick="abrirModalJsProprietario('nao','nao','nao','nao','nao','nao','nao','nao', 'cadProprietario','A', 'btnAddProprietario', 'addProprietario', 'nomeProprietario', 'nao', 'frmAddProprietario')">Cadastrar</button>

    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Nome</th>
                <th scope="col">Contato</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $proprietarios = listarTabela('*', 'proprietario', 'nome');
            if ($proprietarios !== 'Vazio') {
                $cont = 1;
                foreach ($proprietarios as $proprietario) {
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
                                <button type="button" class="btn btn-warning">Editar</button>
                                <button type="button" class="btn btn-danger">Deletar</button>
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
