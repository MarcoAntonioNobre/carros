

<nav class="navbar navbar-expand-lg bg-black" data-bs-theme="dark">
    <div class="container-fluid">
        <img src="./img/13.png" alt="logomarca" width="60px">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <?php
                    if (isset($_SESSION['cpfAdm']) && !empty($_SESSION['cpfAdm'])) {
                        ?>

                        <a class="nav-link active" aria-current="page" href="#"
                           onclick="redireciona('dashboard')">Home</a>
                        <?php
                    }
                    ?>

                </li>
            </ul>
            <?php
            if (isset($_SESSION['cpfAdm']) && !empty($_SESSION['cpfAdm'])) {
                ?>
                <a href="./logout.php" class="btn btn-outline-light" type="submit">Sair</a>
                <?php
            }
            ?>

        </div>
    </div>
</nav>