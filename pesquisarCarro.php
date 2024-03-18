<?php
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($Dados) && !empty($Dados)) {
    echo json_encode($Dados);

//    $inputPesquisa = isset($Dados['inputPesquisa']) ? addslashes(mb_strtoupper($Dados['inputPesquisa'], 'UTF-8')) : '';
//    $retornoInsert = listarItemExpecifico('*', "carro", "carro", $inputPesquisa);
//    if ($retornoInsert > 0) {
//        try {
//            echo json_encode(['success' => true, 'message' => "Encontramos o <b>$inputPesquisa</b>"  ], JSON_THROW_ON_ERROR);
//        } catch (JsonException $e) {
//            $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
//            $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
//            $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
//        }
//    } else {
//        try {
//            echo json_encode(['success' => false, 'message' => "Não encontramos! Error Bd"], JSON_THROW_ON_ERROR);
//        } catch (JsonException $e) {
//            $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
//            $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
//            $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
//        }
//
//    }
//} else {
//    try {
//        echo json_encode(['success' => false, 'message' => "Não encontramos! Error Variável"], JSON_THROW_ON_ERROR);
//    } catch (JsonException $e) {
//        $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
//        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
//        $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
//    }
}
