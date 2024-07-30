<?php
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($Dados) && !empty($Dados)) {

//echo json_encode($Dados);

    $id = isset($Dados['idDeleteVenda']) ? addslashes(mb_strtoupper($Dados['idDeleteVenda'], 'UTF-8')) : '';
    $retornoInsert = deletecadastro('compras', 'idcompras', $id);


    if ($retornoInsert = 1) {
        echo json_encode(['success' => true, 'message' => "Venda <b>$id</b> deletada com sucesso"], JSON_THROW_ON_ERROR);
    } else {
        echo json_encode(['success' => false, 'message' => "Venda Não deletada! Error Bd"], JSON_THROW_ON_ERROR);
    }
} else {
    echo json_encode(['success' => false, 'message' => "Venda Não deletada! Error Variável"], JSON_THROW_ON_ERROR);
}
