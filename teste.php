<?php
?>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header text-white bg-black">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-x-lg"></i></button>
    </div>
    <div class="offcanvas-body bg-black">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <button class="value w-100" onclick="refresh()">
                        <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" data-name="Layer 2">
                            <i class="bi bi-bar-chart-line"></i>
                        </svg>
                        Gráfico
                    </button>
                    <button class="value w-100" onclick="carregarConteudo('listarCarros')">
                        <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" data-name="Layer 2">
                            <i class="bi bi-car-front-fill"></i>
                        </svg>
                        Carros
                    </button>
                    <button class="value w-100" onclick="carregarConteudo('listarProprietarios')">
                        <svg id="Line" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                            <i class="bi bi-person-fill"></i>
                        </svg>
                        Propietários
                    </button>
                    <button class="value w-100" onclick="carregarConteudo('listarCliente')">
                        <svg viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
                            <i class="bi bi-person-circle"></i>
                        </svg>
                        Cliente
                    </button>
                    <button class="value w-100" onclick="carregarConteudo('listarFoto')">
                        <svg id="svg8" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                            <i class="bi bi-file-earmark-image"></i>
                        </svg>
                        Fotos
                    </button>
                    <button class="value w-100" onclick="carregarConteudo('listarTotal')">
                        <svg fill="none" viewBox="0 0 24 25" xmlns="http://www.w3.org/2000/svg">
                            <i class="bi bi-cash-coin"></i>
                        </svg>
                        Total
                    </button>
                    <button class="value w-100" onclick="carregarConteudo('listarVenda')">
                        <svg fill="none" viewBox="0 0 24 25" xmlns="http://www.w3.org/2000/svg">
                            <i class="bi bi-cash-stack"></i>
                        </svg>
                        Vendas
                    </button>
                    <button class="value w-100" onclick="carregarConteudo('listarAdm')">
                        <svg fill="none" viewBox="0 0 24 25" xmlns="http://www.w3.org/2000/svg">
                            <i class="bi bi-person-gear"></i>
                        </svg>
                        Admin
                    </button>
                </div>
            </div>
            <div class="col-12">
                <!--                    <a href="./logout.php" class="btn btn-outline-light" type="submit">Sair</a>-->
                <button class="Btn " onclick="redireciona('logout')">
                    <div class="sign">
                        <svg viewBox="0 0 512 512">
                            <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                        </svg>
                    </div>
                    <div class="text">Sair</div>
                </button>
            </div>
        </div>



    </div>
</div>
