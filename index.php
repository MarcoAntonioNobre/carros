<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");

?>

<!doctype html>
<html lang="pt-br">

<head>
    <title>AREA DE LOGIN</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
</head>

<body class="bodylogin text-white" style="background-image: url('./img/funlogin3.jpg');background-size: cover;background-repeat: no-repeat;width: 100%;height: 100%;">
    <nav class="navbar bg-dark " data-bs-theme="dark">
        <div class="container-fluid " >
            <a class="navbar-brand text-white" href="index.php" style="font-family:monospace;">
                StreetCar
            </a>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-md-4 ">
                <div class="wrapper">
                    <form action="login.php" method="post" name="frmLogin" id="frmLogin">
                        <h1>LOGIN</h1>
                        <div class="input-box">
                            <input type="text" name="cpf" id="cpf" placeholder="Cpf" autocomplete="off" oninput="mascaraCPF(this)">
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
            </div>
        </div>
    </div>
    <footer class="mt-5">
        <div class="card text-center bg-dark text-white">

            <div class="card-body">
                <ul class="list-unstyled wrapper1 ">
                    <li class="icon twitter">
                        <span class="tooltip">Twitter</span>
                        <span><i class="fab fa-x-twitter"></i></span>
                    </li>
                    <li class="icon instagram">
                        <span class="tooltip">Instagram</span>
                        <span><i class="fab fa-instagram"></i></span>
                    </li>
                    <li class="icon youtube">
                        <span class="tooltip">Spotify</span>
                        <span><i class="fab fa-spotify"></i></span>
                    </li>
                </ul>
            </div>
            <div class="card-footer text-white">
                <p>© StreetCar <script>
                        document.write(new Date().getFullYear());
                    </script> Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>
    <script src="./js/formatacoes.js"></script>
    <script src="./js/js.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js" integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </script>
   
    <script>
        // $('#cpf').mask('000.000.000-00', {reverse: true});
        $(document).ready(function() {
            var $cpf = $("#cpf");
            $cpf.mask('000.000.000-00', {
                reverse: false
            });
        });
       
    </script>
</body>

</html>