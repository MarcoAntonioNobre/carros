<?php

include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados) && !empty($dados)){
    $carro = isset($dados['inpCarro']) ? addslashes($dados['inpCarro']) : '';
    $modelo =isset($dados['inpModelo']) ? addslashes($dados['inpModelo']) : '';
    $valor =isset($dados['inpValor']) ? addslashes($dados['inpValor']) : '';
    $proprietario = isset($dados['selectProprietario']) ? addslashes($dados['selectProprietario']) : '';
    $foto = isset($dados['inpFotoCarro']) ? addslashes($dados['inpFotoCarro']) : '';

    $retornoInsert = insertGlobal5('carro', 'idproprietario, foto, carro, modelo, valor', $foto, $proprietario,$carro,$modelo,$valor);
    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Carro $modelo cadastrado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Carro não cadastrado!"]);
    }
} else {
    echo json_encode((['success' => false, 'message' => 'Carro não encontrado!']));
}

//echo json_encode($dados);
