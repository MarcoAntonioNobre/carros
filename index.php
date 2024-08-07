<?php
include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");
$adm = 0;
?>

<!doctype html>
<html lang="pt-br">

<head>
    <title>Login</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="./css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/style-navbar.css">

</head>
<style>
    input[type="text"], textarea {
        background-color: #d1d1d1;
    }
</style>
<body class="bodylogin"
      style="background-size: cover;background-repeat: no-repeat;width: 100%;height: 100%;">
<?php
include_once('navbar.php');
?>
<div class="container mt-5  ">

    <div class=" d-flex justify-content-center">
        <div class=" d-flex align-items-center justify-content-center  ">
            <div class="wrapper">
                <form action="login.php" method="post" name="frmLogin" id="frmLogin" autocomplete="off">
                    <h1>LOGIN</h1>
                    <div class="row">
                        <div class="col-12 text-center">
                        <i class="bi bi-eye-slash" id="btn-senha" onclick="mostrarsenha()"></i>
                    </div>

                        </div>

                    <div class="input-box">
                        <!--                        <input type="text" class="cpf" name="cpf" id="cpf" placeholder="Cpf">-->
                        <!--                        <i class="bi bi-person-bounding-box"></i>-->
                        <div class="wave-group">
                            <input required="required" type="text" class="input text-white cpf" name="cpf" id="cpf"
                                   style="background-color: transparent" autocomplete="off">
                            <span class="bar"> </span>

                            <label class="label">
                                <span class="label-char" style="--index: 0">C</span>
                                <span class="label-char" style="--index: 1">P</span>
                                <span class="label-char" style="--index: 2">F</span>
                            </label>
                        </div>
                    </div>
                    <div class="input-box">
                        <div class="wave-group">

                            <input required="required" type="password" class="input text-white " name="senha"
                                   id="senha" autocomplete="off">
                            <span class="bar"> </span>
                            <label class="label">
                                <span class="label-char" style="--index: 0">S</span>
                                <span class="label-char" style="--index: 1">e</span>
                                <span class="label-char" style="--index: 2">n</span>
                                <span class="label-char" style="--index: 3">h</span>
                                <span class="label-char" style="--index: 3">a</span>

                            </label>


                        </div>


                    </div>
                    <div class="alert erroBonito p-1 text-center" role="alert" id="alertlog" style="display: none;">
                    </div>
                    <button type="button" class="w-100 mb-1" onclick="fazerLogin()">
                        <span class="">Login</span>
                    </button>
                 <div id="dataHora">
                    <span id="bi bi-calendar-week-fill mb-2"></span>
                     <span id="dataHoraTexto"></span>
                     <span id="HoraTexto"></span>
                 </div>
                    <script>
                        atualizarDataHora();
                    </script>
                </form>
            </div>
        </div>
    </div>
</div>

<!--<button onclick=" carregarConteudo('carros')">clica</button>-->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"
        integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--    </script>-->
<!--    </head>-->

<script src="http://www.geradorcpf.com/scripts.js"></script>
<script src="http://www.geradorcpf.com/jquery-1.2.6.pack.js"></script>
<script src="http://www.geradorcpf.com/jquery.maskedinput-1.1.4.pack.js"></script>
<script src="./js/mobile-navbar.js"></script>
<script src="./js/formatacoes.js"></script>
<script src="./js/script.js"></script>
<script src="js/js.js"></script>

<!--    </script>-->

<!--    <script type="text/javascript">-->
<!--        $(document).ready(function() {-->
<!--            $(".cpf").mask("999.999.999-99");-->
<!---->
<!--            $("#cpf").blur(function() {-->
<!--                if ($("#cpf").val() == '') {-->
<!--                    $("#saida").html("Informe um CPF");-->
<!--                    return false;-->
<!--                }-->
<!--                if (validarCPF($("#cpf").val())) {-->
<!--                    $(".cpf").css('border-color', 'limegreen');-->
<!--                } else {-->
<!--                    $(".cpf").css('border-color', 'red');-->
<!--                }-->
<!--            });-->
<!--        });-->
<!--    </script>-->
</body>

</html>
