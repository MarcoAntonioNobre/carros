<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");
?>
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
                    <td><img src="./img/<?php echo $foto; ?>"></td>
                    <td><?php echo $nome; ?></td>
                    <td><?php echo $contato; ?></td>
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