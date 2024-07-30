<?php

include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados) && !empty($dados)) {
    $carro = isset($dados['inpNomeCarro']) ? addslashes(mb_strtoupper($dados['inpNomeCarro'], 'UTF-8')) : '';
    $diferenciais = isset($dados['inpDiferenciais']) ? addslashes(mb_strtoupper($dados['inpDiferenciais'], 'UTF-8')) : '';
    $valor = isset($dados['inpValor']) ? addslashes($dados['inpValor']) : '';
    $proprietario = isset($dados['selectProprietario']) ? addslashes($dados['selectProprietario']) : '';
}
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $fotoTmpName = $_FILES['foto']['tmp_name'];
    $fotoName = $_FILES['foto']['name'];
    $uploadDir = 'img';
    $fotoPath = uniqid() . '_' . $fotoName;

    if (move_uploaded_file($fotoTmpName, $uploadDir . '/' . $fotoPath)) {
        $retornoInsert = insertGlobal6('carro', 'idproprietario, nomeCarro, diferenciais, fotoPerfil, preco, cadastro', $proprietario, $carro, $diferenciais, $fotoPath, $valor, DATATIMEATUAL);

        if ($retornoInsert > 0) {
            echo json_encode(['success' => true, 'message' => "Carro $carro cadastrado com sucesso"]);
        } else {
            echo json_encode(['success' => false, 'message' => "Carro não cadastrado!"]);
        }
    } else {
        echo json_encode((['success' => false, 'message' => 'Carro não encontrado!']));
    }
} else {
    echo 'Nenhuma imagem enviada!!';
}

//echo json_encode($dados);

//    $retornoInsert = insertGlobal6('carro', 'idproprietario, nomeCarro, diferenciais, fotoPerfil, preco, cadastro',$proprietario, $carro, $diferenciais, $foto, $valor, DATATIMEATUAL);
//    if ($retornoInsert > 0) {
//        echo json_encode(['success' => true, 'message' => "Carro $modelo cadastrado com sucesso"]);
//    } else {
//        echo json_encode(['success' => false, 'message' => "Carro não cadastrado!"]);
//    }
//} else {
//    echo json_encode((['success' => false, 'message' => 'Carro não encontrado!']));
//}

//echo json_encode($dados);
