<?php

include_once("config/constantes.php");
include_once("config/conexao.php");
include_once("func/funcoes.php");
$controle = filter_input(INPUT_POST, 'controle', FILTER_SANITIZE_STRING);
if (!empty($controle) && isset($controle)) {
    switch ($controle) {

        case 'listarCliente':
            include_once('listarCliente.php');
            break;
        case 'listarProprietarios';
            include_once('listarProprietarios.php');
            break;
        case 'listarCarros';
            include_once('carros.php');
            break;
        case 'addProprietario';
            include_once('cadProprietario.php');
            break;
        case 'editProprietario';
            include_once('editProprietario.php');
            break;
        case 'deleteProprietario';
            include_once('deleteProprietario.php');
            break;
        case 'pesquisarCarro';
            include_once('pesquisarCarro.php');
            break;
        case 'listarTotal';
            include_once('listarTotal.php');
            break;
        case 'listarFoto';
            include_once('fotos.php');
            break;
        case 'addFoto';
            include_once('cadFoto.php');
            break;
            case 'apagarFoto';
            include_once  ('deletarFoto.php');
            break;
        case 'addCliente';
            include_once('cadCliente.php');
            break;
        case 'carroAdd';
            include_once('cadCarro.php');
            break;
        case 'listarAdm';
            include_once('listarAdm.php');
            break;
        case 'editCliente';
            include_once('editCliente.php');
            break;
        case 'deleteCliente';
            include_once('deleteCliente.php');
            break;
        case 'addAdm';
            include_once('cadAdm.php');
            break;
        case 'editAdm';
            include_once('editAdm.php');
            break;
        case 'deleteAdm';
            include_once('deleteAdm.php');
            break;
        default;
            echo 'Menu inexistente';
    }
} else {
    ?>
    <div style="display: flex;justify-content: center;align-items: center; min-height: 95vh !important;">
        <h1>Página Vazia, Retorne. </h1><sup>Error 404</sup>
        <img src="./img/vazio.gif" alt="ERROR 404">
    </div>
    <?php
}

//$acao = filter_input(INPUT_POST, 'ação', FILTER_SANITIZE_STRING);
//$acaoId = filter_input(INPUT_POST, 'acaoId', FILTER_SANITIZE_NUMBER_INT);
//$controleGet = filter_input(INPUT_GET, 'controleGet', FILTER_SANITIZE_STRING);
