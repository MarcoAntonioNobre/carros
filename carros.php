<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Proprietário</th>
        <th scope="col">Carro</th>
        <th scope="col">Valor</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $carros = listarTabelaInnerJoin('*', 'carros', 'proprietario', 'idcarro', 'idproprietario', 'carro', 'ASC');
    $contar = 1;
    foreach ($carros as $carro) {
        $idcarro = $carro->idcarro;
        $idpropietario = $carro->idpropietario;
        $nomeCarro = $carro->carro;
        $modelo = $carro->modelo;
        $valor = $carro->valor;
        ?>
        <tr>
            <th scope="row"><?php echo $contar ?></th>
            <td colspan="2"><?php echo $idpropietario ?></td>
            <td>@twitter</td>
        </tr>

        <?php
        ++$contar;
    }
    ?>

    </tbody>
</table>