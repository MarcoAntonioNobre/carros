<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");

?>

<!doctype html>
<html lang="pt-br">

<head>
    <title>Dashboard</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bodylogin" style="background-image: url('./img/funlogin3.jpg');background-size: cover;background-repeat: no-repeat;width: 100%;height: 100%;">
    <nav class="navbar bg-dark " data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand text-black" href="#">
                <img src="./img/icon.jpg" alt="Logo" width="30px" class="d-inline-block align-text-top">
                Carro
            </a>
        </div>
    </nav>
    <div class="container mt-5 ">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <div class="wrapper">
                    <form action="login.php" method="post" name="frmLogin" id="frmLogin">
                        <h1>LOGIN</h1>
                        <div class="input-box">
                            <input type="text" name="cpf" id="cpf" placeholder="Cpf">
                            <i class="bi bi-person-bounding-box"></i>
                        </div>
                        <div class="input-box">
                            <input type="password" name="senha" id="senha" placeholder="Senha">
                            <i class="bi bi-lock" id="btn-senha" onclick="mostrarsenha()"></i>
                        </div>
                        <div class="alert alert-light" role="alert" id="alertlog" style="display: none;">
                        </div>
                        <button type="button" class="btn" onclick="fazerLogin()">Login</button>
                    </form>
                </div>
                <?php
                $senha = "123456789";
                $options = [
                    'cost' => 12,
                ];
                $senhaHash = password_hash($senha, PASSWORD_BCRYPT, $options);
                echo $senhaHash;
                ?>
            </div>
        </div>
    </div>
    <footer>
        <div class="card text-center bg-dark text-white " style="margin-top: 8%;">
            <div class="card-header">
                <img src="./img/icon.jpg" alt="icon" width="50px">
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
            </div>

        </div>
    </footer>
    <!--<button onclick=" carregarConteudo('carros')">clica</button>-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js" integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/script.js"></script>
    <script src="./js/formatacoes.js"></script>
    <script src="./js/js.js"></script>

</body>

</html>