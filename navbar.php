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
    <a class="logo" href="dashboard.php"><img src="./img/13.png" alt="Logo StreetCar" title="Logo StreetCar"
                                              width="50px"> StreetCar</a>
    <?php
    if (isset($_SESSION['cpfAdm']) && !empty($_SESSION['cpfAdm'])) {
        if ($adm == 1) {
            ?>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav-list">
                <li onclick="refresh()">
                    <i class="bi bi-bar-chart-line"></i>
                    Gráfico
                </li>
                <li onclick="carregarConteudo('listarCarros')">
                    <i class="bi bi-car-front-fill"></i>
                    Carros
                </li>
                <li onclick="carregarConteudo('listarProprietarios')">
                    <i class="bi bi-person-fill"></i>
                    Propietários
                </li>
                <li onclick="carregarConteudo('listarCliente')">
                    <i class="bi bi-person-circle"></i>
                    Cliente
                </li>
                <li onclick="carregarConteudo('listarFoto')">
                    <i class="bi bi-file-earmark-image"></i>
                    Fotos
                </li>
                <li onclick="carregarConteudo('listarTotal')">
                    <i class="bi bi-cash-coin"></i>
                    Total
                </li>
                <li onclick="carregarConteudo('listarVenda')">
                    <i class="bi bi-cash-stack"></i>
                    Vendas
                </li>
                <li onclick="carregarConteudo('listarAdm')">
                    <i class="bi bi-person-gear"></i>
                    Admin
                </li>
                <li>

                    <a href="./logout.php" class="btn btn-outline-light" type="submit">Sair</a>

                </li>
                <!---->
                <!--        <li><a href="#">Sobre</a></li>-->
                <!--        <li><a href="#">Projetos</a></li>-->
                <!--        <li><a href="#">Contato</a></li>-->
            </ul>
            <?php
        }
    }
    ?>
    <?php
    if ($adm !== 1) {
        if (isset($_SESSION['cpfAdm']) && !empty($_SESSION['cpfAdm'])) {
            ?>
            <a href="./logout.php" class="btn btn-outline-light" type="submit">Sair</a>
            <?php
        }
    } else {
        ?>
        <a href="./logout.php" class="btn btn-outline-light sair" type="submit">Sair</a>
        <?php
    }
    ?>
</nav>