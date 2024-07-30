<?php
include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados) && !empty($dados)) {
    $id = isset($dados['idDeleteCarro']) ? addslashes(mb_strtoupper($dados['idDeleteCarro'], 'UTF-8')) : '';

    $retornoInsert = deletecadastro('carro','idcarro', $id);
    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Carro deletado com sucesso!"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Carro não deletado!"]);
    }
} else {
    echo json_encode((['success' => false, 'message' => 'Carro não encontrada!']));
}