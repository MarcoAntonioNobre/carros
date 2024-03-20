<?php
include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados) && !empty($dados)) {
    $id = isset($dados['idEditFoto']) ? addslashes($dados['idEditFoto']) : '';
    $proprietario = isset($dados['inpEditGrupo']) ? addslashes($dados['inpEditGrupo']) : '';
    $tCarro = listarTabela('*', 'carro');
    foreach ($tCarro as $carroTabela) {
        $idProp = $carroTabela->idproprietario;
        if ($idProp == $proprietario) {
            $carro = $carroTabela->idcarro;
        }
    }
}
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $fotoTmpName = $_FILES['foto']['tmp_name'];
    $fotoName = $_FILES['foto']['name'];
    $uploadDir = 'img';
    $fotoPath = uniqid() . '_' . $fotoName;

    if (move_uploaded_file($fotoTmpName, $uploadDir . '/' . $fotoPath)) {

        $retornoUpdate = alterarGlobal3('foto','idcarro','idproprietario','foto',"$carro","$proprietario","$fotoPath",'idfoto',"$id");
        if ($retornoUpdate > 0) {
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