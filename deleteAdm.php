<?php
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($Dados) && !empty($Dados)) {

//echo json_encode($Dados);

    $id = isset($Dados['idDeleteAdm']) ? addslashes($Dados['idDeleteAdm']) : '';
    $retornoInsert = deletecadastro('adm', 'idadm', $id);


    if ($retornoInsert = 1 ) {
        echo json_encode(['success' => true, 'message' => "Administrador <b>$id</b> deletado com sucesso"], JSON_THROW_ON_ERROR);
    } else {
        echo json_encode(['success' => false, 'message' => "Administrador Não deletado! Error Bd"], JSON_THROW_ON_ERROR);
    }
} else {
    echo json_encode(['success' => false, 'message' => "Administrador Não deletado! Error Variável"], JSON_THROW_ON_ERROR);
}
