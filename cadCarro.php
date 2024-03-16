<?php

include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados) && !empty($dados)) {
    $carro = isset($dados['inpCarro']) ? addslashes(mb_strtoupper($dados['inpCarro'], 'UTF-8')) : '';
    $modelo = isset($dados['inpModelo']) ? addslashes(mb_strtoupper($dados['inpModelo'], 'UTF-8')) : '';
    $valor = isset($dados['inpValor']) ? addslashes(mb_strtoupper($dados['inpValor'], 'UTF-8')) : '';
    $proprietario = isset($dados['selectProprietario']) ? addslashes(mb_strtoupper($dados['selectProprietario'], 'UTF-8')) : '';
    $foto = isset($dados['inpFotoCarro']) ? addslashes(mb_strtoupper($dados['inpFotoCarro'], 'UTF-8')) : '';

    $retornoInsert = insertGlobal5('carro', 'idproprietario, foto, carro, modelo, valor', $foto, $proprietario, $carro, $modelo, $valor);
    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Carro $modelo cadastrado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Carro não cadastrado!"]);
    }
} else {
    echo json_encode((['success' => false, 'message' => 'Carro não encontrado!']));
}

//echo json_encode($dados);
