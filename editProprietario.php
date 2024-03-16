<?php
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($Dados) && !empty($Dados)) {

//    echo json_encode($Dados);

$nome = isset($Dados['nomeEditProprietario']) ? addslashes(mb_strtoupper($Dados['nomeEditProprietario'], 'UTF-8')) : '';
$id = isset($Dados['idEditProprietario']) ? addslashes(mb_strtoupper($Dados['idEditProprietario'], 'UTF-8')) : '';

$retornoInsert = alterarGlobal1('proprietario', 'nomeProprietario', $nome,'idproprietario',$id);


if ($retornoInsert > 0) {
    try {
        echo json_encode(['success' => true, 'message' => "Proprietário <b>$nome</b> cadastrado com sucesso"], JSON_THROW_ON_ERROR);
    } catch (JsonException $e) {
        $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
        $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
    }
} else {
    try {
        echo json_encode(['success' => false, 'message' => "Proprietário Não cadastrado! Error Bd"], JSON_THROW_ON_ERROR);
    } catch (JsonException $e) {
        $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
        $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
    }
}
} else {
    try {
        echo json_encode(['success' => false, 'message' => "Proprietário Não cadastrado! Error Variável"], JSON_THROW_ON_ERROR);
    } catch (JsonException $e) {
        $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
        $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
    }
}
