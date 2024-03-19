<?php
include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados) && !empty($dados)) {
    $idcarro = isset($dados['idcompra']) ? addslashes($dados['idcompra']) : 0;
    $qtd = isset($dados['inQuantidade']) ? addslashes($dados['inQuantidade']) : 0;
    $precoV = isset($dados['precoVeiculo']) ? addslashes($dados['precoVeiculo']) : 0;
    $a = conversorDBNumPonto($precoV);
    $total = $a * $qtd;

    $retornoInsert = insertGlobal4('compras', 'idcarro,valorUnidade,valorPago,cadastro', "$idcarro", "$precoV", "$total", DATATIMEATUAL);
    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Veículo comprado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Veículo não comprado!"]);
    }
} else {
    echo json_encode((['success' => false, 'message' => 'Veículo não encontrado!']));
}

//echo json_encode($dados);