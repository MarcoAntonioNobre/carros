<?php
include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados) && !empty($dados)) {
    $id = isset($dados['idDeleteFoto']) ? addslashes($dados['idDeleteFoto']) : '';

    $retornoInsert = deletecadastro('foto','idfoto', $id);
    if ($retornoInsert = 1) {
        echo json_encode(['success' => true, 'message' => "Foto deletada com sucesso!"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Foto não deletada!"]);
    }
} else {
    echo json_encode((['success' => false, 'message' => 'Foto não encontrada!']));
}

//echo json_encode($dados);