<!--<nav class="navbar navbar-expand-lg bg-black" data-bs-theme="dark">-->
<!--    <div class="container-fluid">-->
<!--        <a href="dashboard.php"><img src="./img/13.png" alt="logomarca" width="60px">-->
<!--        </a>-->
<!---->
<!--            --><?php
//            if (isset($_SESSION['cpfAdm']) && !empty($_SESSION['cpfAdm'])) {
//                ?>
<!--                <a href="./logout.php" class="btn btn-outline-light" type="submit">Sair</a>-->
<!--                --><?php
//            }
//            ?>
<!--    </div>-->
<!--</nav>-->

<nav>
    <a class="logo testeRespose" href="dashboard.php"><img src="./img/13.png" alt="Logo StreetCar" title="Logo StreetCar"
                                              width="50px"> StreetCar</a>
    <?php
    $cpfAdmin = 'N/A';
    if (isset($_SESSION['cpfAdm']) && !empty($_SESSION['cpfAdm'])) {
        $cpf = $_SESSION['cpfAdm'];
        $cpfAdm = listarTabela('*', 'adm');
        foreach ($cpfAdm as $cpfAdmin) {
            $check = $cpfAdmin->cpf;
            if ($check == $cpf) {
                $nome = $cpfAdmin->nomeAdm;
                $nome = mb_strtolower($nome);
                $nome = converterAcentuacao($nome);
            }
        } ?>
        <div class="p"><?php echo 'ADM '.$nome; ?></div>

    <?php
    }
    if ($adm !== 1) {
        if (isset($_SESSION['cpfAdm']) && !empty($_SESSION['cpfAdm'])) {
            ?>
            <a href="./logout.php" class="btn btn-outline-light" type="submit">Sair</a>
            <?php
        }
    } else {
        ?>
        <button class="btn btn-outline-light list" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="bi bi-list"></i>
        </button>
        <a href="./logout.php" class="btn btn-outline-light sair" type="submit">Sair</a>

        <?php
    }
    ?>
</nav>