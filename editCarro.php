<?php
include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados) && !empty($dados)) {
    $id = isset($dados['idEditCarro']) ? addslashes($dados['idEditCarro']) : '';
    $carro = isset($dados['inpNomeEditCarro']) ? addslashes(mb_strtoupper($dados['inpNomeEditCarro'], 'UTF-8')) : '';
    $diferenciais = isset($dados['inpEditDiferenciais']) ? addslashes(mb_strtoupper($dados['inpEditDiferenciais'], 'UTF-8')) : '';
    $valor = isset($dados['inpEditValor']) ? addslashes($dados['inpEditValor']) : '';
    $proprietario = isset($dados['selectEditProprietario']) ? addslashes($dados['selectEditProprietario']) : '';
}
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $fotoTmpName = $_FILES['foto']['tmp_name'];
    $fotoName = $_FILES['foto']['name'];
    $uploadDir = 'img';
    $fotoPath = uniqid() . '_' . $fotoName;

    if (move_uploaded_file($fotoTmpName, $uploadDir . '/' . $fotoPath)) {
        $retornoInsert = alterarGlobal5('carro', 'idproprietario', 'nomeCarro', 'diferenciais', 'fotoPerfil', 'preco', "$proprietario", "$carro", "$diferenciais", "$fotoPath", "$valor",'idcarro',"$id" );

        if ($retornoInsert > 0) {
            echo json_encode(['success' => true, 'message' => "Carro $carro alterado com sucesso"]);
        } else {
            echo json_encode(['success' => false, 'message' => "Carro não alterado!"]);
        }
    } else {
        echo json_encode((['success' => false, 'message' => 'Carro não encontrado!']));
    }
} else {
    echo 'Nenhuma imagem enviada!!';
}


//echo json_encode($dados);