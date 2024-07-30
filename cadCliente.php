<?php

include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados) && !empty($dados)) {
    $nome = isset($dados['inpNome']) ? addslashes(mb_strtoupper($dados['inpNome'], 'UTF-8')) : '';
    $contato = isset($dados['inpContato']) ? addslashes(mb_strtoupper($dados['inpContato'], 'UTF-8')) : '';
    $numeroCartao = isset($dados['inpValorUnitario']) ? addslashes(mb_strtoupper($dados['inpValorUnitario'], 'UTF-8')) : '';
    $valorCartao = isset($dados['inpValorCartao']) ? addslashes(mb_strtoupper($dados['inpValorCartao'], 'UTF-8')) : '';

    $retornoInsert = insertGlobal5('cliente', 'nomeCliente, contato, numeroCartao, valorCartao, cadastro', "$nome", "$contato", "$numeroCartao", "$valorCartao", DATATIMEATUAL);
    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Cliente $nome cadastrado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Cliente não cadastrado!"]);
    }
} else {
    echo json_encode((['success' => false, 'message' => 'Cliente não encontrado!']));
}

//echo json_encode($dados);