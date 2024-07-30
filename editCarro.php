<?php
include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados) && !empty($dados)) {
    $id = isset($dados['idEditCarro']) ? addslashes($dados['idEditCarro']) : '';
    $carro = isset($dados['inpNomeEditCarro']) ? addslashes(mb_strtoupper($dados['inpNomeEditCarro'], 'UTF-8')) : '';
    $diferenciais = isset($dados['inpEditDiferenciais']) ? addslashes(mb_strtoupper($dados['inpEditDiferenciais'], 'UTF-8')) : '';
    $valor = isset($dados['inpEditValor']) ? addslashes($dados['inpEditValor']) : '';
    $proprietario = isset($dados['selectEditProprietario']) ? addslashes($dados['selectEditProprietario']) : '';

    $retornoInsert = alterarGlobal4('carro', 'idproprietario', 'nomeCarro', 'diferenciais', 'preco', "$proprietario", "$carro", "$diferenciais", "$valor",'idcarro',"$id" );

    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Carro $carro alterado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Carro não alterado!"]);
    }
} else {
    echo json_encode((['success' => false, 'message' => 'Carro não encontrado!']));
}


//echo json_encode($dados);