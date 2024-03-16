<?php
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($Dados) && !empty($Dados)) {

//    echo json_encode($Dados);

    $nome = isset($Dados['nomeProprietario']) ? addslashes(mb_strtoupper($Dados['nomeProprietario'], 'UTF-8')) : '';
    $dataHora = isset($Dados['dataTime']) ? addslashes(mb_strtoupper($Dados['dataTime'], 'UTF-8')) : '';

    $retornoInsert = insertGlobal2('proprietario', 'nomeProprietario,cadastro', $nome, $dataHora);


    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Proprietário <b>$nome</b> cadastrado com sucesso"], JSON_THROW_ON_ERROR);
    } else {
        echo json_encode(['success' => false, 'message' => "Proprietário Não cadastrado! Error Bd"], JSON_THROW_ON_ERROR);
    }
} else {
    echo json_encode(['success' => false, 'message' => "Proprietário Não cadastrado! Error Variável"], JSON_THROW_ON_ERROR);
}
