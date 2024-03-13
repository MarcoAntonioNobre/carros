<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");


$proprietarios = listarTabela('*', 'proprietario','nome');
foreach ($proprietarios as $proprietario){
    $foto = $proprietario-> foto;
    $nome = $proprietario->nome;
    $contato = $proprietario->contato;
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
        <tr>
            <th scope="row">1</th>
            <td><img src="./img/<?php echo $foto?>"></td>
            <td><?php echo $nome; ?></td>
            <td><?php echo $contato;?></td>
        </tr>
        </tbody>
    </table>
<?php
}
?>

