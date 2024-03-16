<?php
if (isset($Dados) && !empty($Dados)) {
    $Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    echo json_encode($Dados);

//$nome = isset($Dados['nomeProprietario']) ? addslashes(mb_strtoupper($Dados['nomeProprietario'], 'UTF-8')) : '';
//$contato = isset($Dados['contatoProprietario']) ? addslashes(mb_strtoupper($Dados['contatoProprietario'], 'UTF-8')) : '';
//$foto = isset($Dados['fotoProprietario']) ? addslashes(mb_strtoupper($Dados['fotoProprietario'], 'UTF-8')) : '';
//
//$retornoInsert = insertGlobalProp('proprietario', 'nome,contato,foto', $nome, $contato,$foto);
//
//
//if ($retornoInsert > 0) {
//    try {
//        echo json_encode(['success' => true, 'message' => "Proprietário <b>$nome</b> cadastrado com sucesso"], JSON_THROW_ON_ERROR);
//    } catch (JsonException $e) {
//        $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
//        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
//        $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
//    }
//} else {
//    try {
//        echo json_encode(['success' => false, 'message' => "Proprietário Não cadastrado! Error Bd"], JSON_THROW_ON_ERROR);
//    } catch (JsonException $e) {
//        $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
//        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
//        $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
//    }
//}
//} else {
//    try {
//        echo json_encode(['success' => false, 'message' => "Proprietário Não cadastrado! Error Variável"], JSON_THROW_ON_ERROR);
//    } catch (JsonException $e) {
//        $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
//        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
//        $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
//    }
}