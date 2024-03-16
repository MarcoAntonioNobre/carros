<?php

include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados) && !empty($dados)){
    $nome = isset($dados['inpNome']) ? addslashes($dados['inpNome']) : '';
    $contato =isset($dados['inpContato']) ? addslashes($dados['inpContato']) : '';
    $valorUnitario =isset($dados['inpValorUnitario']) ? addslashes($dados['inpValorUnitario']) : '';
    $valorCartao = isset($dados['inpValorCartao']) ? addslashes($dados['inpValorCartao']) : '';

    $retornoInsert = insertGlobal5('cliente', 'nomeCliente, contato, valorUnitario, valorCartao, cadastro', "$nome", "$contato","$valorUnitario","$valorCartao",DATATIMEATUAL);
    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Cliente $nome cadastrado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Cliente não cadastrado!"]);
    }
} else {
    echo json_encode((['success' => false, 'message' => 'Cliente não encontrado!']));
}

//echo json_encode($dados);