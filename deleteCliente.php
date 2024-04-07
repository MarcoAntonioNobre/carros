<?php
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($Dados) && !empty($Dados)) {

//echo json_encode($Dados);

    $id = isset($Dados['idDeleteCliente']) ? addslashes($Dados['idDeleteCliente']) : '';
    $retornoInsert = deletecadastro('cliente', 'idcliente', $id);


    if ($retornoInsert = 1 ) {
        echo json_encode(['success' => true, 'message' => "Cliente <b>$id</b> deletado com sucesso"], JSON_THROW_ON_ERROR);
    } else {
        echo json_encode(['success' => false, 'message' => "Cliente Não deletado! Error Bd"], JSON_THROW_ON_ERROR);
    }
} else {
    echo json_encode(['success' => false, 'message' => "Cliente Não deletado! Error Variável"], JSON_THROW_ON_ERROR);
}
