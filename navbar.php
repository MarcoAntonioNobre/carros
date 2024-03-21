

<nav class="navbar navbar-expand-lg bg-black" data-bs-theme="dark">
    <div class="container-fluid">
        <a href="dashboard.php"><img src="./img/13.png" alt="logomarca" width="60px">
        </a>

            <?php
            if (isset($_SESSION['cpfAdm']) && !empty($_SESSION['cpfAdm'])) {
                ?>
                <a href="./logout.php" class="btn btn-outline-light" type="submit">Sair</a>
                <?php
            }
            ?>


    </div>
</nav>