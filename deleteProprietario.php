<?php
//if (isset($Dados) && !empty($Dados)) {
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

echo json_encode($Dados);

//    $id = isset($Dados['idDeleteProprietario']) ? addslashes(mb_strtoupper($Dados['idDeleteProprietario'], 'UTF-8')) : '';
//    $retornoInsert = deletecadastro('proprietario', 'idproprietario', $id);
//
//
//    if ($retornoInsert > 0) {
//        try {
//            echo json_encode(['success' => true, 'message' => "Proprietário <b>$id</b> cadastrado com sucesso"], JSON_THROW_ON_ERROR);
//        } catch (JsonException $e) {
//            $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
//            $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
//            $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
//        }
//    } else {
//        try {
//            echo json_encode(['success' => false, 'message' => "Proprietário Não cadastrado! Error Bd"], JSON_THROW_ON_ERROR);
//        } catch (JsonException $e) {
//            $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
//            $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
//            $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
//        }
//
//    }
//} else {
//    try {
//        echo json_encode(['success' => false, 'message' => "Proprietário Não cadastrado! Error Variável"], JSON_THROW_ON_ERROR);
//    } catch (JsonException $e) {
//        $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
//        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
//        $error_message .= 'Lile: ' . $e->getLine() . PHP_EOL;
//    }
//}
