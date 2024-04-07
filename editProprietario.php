<?php
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($Dados) && !empty($Dados)) {

//    echo json_encode($Dados);

    $nome = isset($Dados['nomeEditProprietario']) ? addslashes($Dados['nomeEditProprietario']) : '';
    $id = isset($Dados['idEditProprietario']) ? addslashes($Dados['idEditProprietario']) : '';

    $retornoInsert = alterarGlobal1('proprietario', 'nomeProprietario', $nome, 'idproprietario', $id);


    if ($retornoInsert = 1) {
        echo json_encode(['success' => true, 'message' => "Proprietário <b>$nome</b> cadastrado com sucesso"], JSON_THROW_ON_ERROR);

    } else {
        echo json_encode(['success' => false, 'message' => "Proprietário Não cadastrado! Error Bd"], JSON_THROW_ON_ERROR);
    }
} else {
    echo json_encode(['success' => false, 'message' => "Proprietário Não cadastrado! Error Variável"], JSON_THROW_ON_ERROR);

}
