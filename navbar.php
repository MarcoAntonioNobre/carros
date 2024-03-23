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
        <div class="p">Adm <?php echo $nome; ?></div>
        <?php
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
                    Total de vendas
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
                    <!--                    <a href="./logout.php" class="btn btn-outline-light" type="submit">Sair</a>-->
                    <button class="Btn" onclick="redireciona('logout')">
                        <div class="sign">
                            <svg viewBox="0 0 512 512">
                                <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                            </svg>
                        </div>
                        <div class="text">Sair</div>
                    </button>


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