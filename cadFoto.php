<?php
include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dados) && !empty($dados)) {
    $grupo = isset($dados['inpGrupo']) ? addslashes($dados['inpGrupo']) : '';
    $data = isset($dados['dataTime']) ? addslashes($dados['dataTime']) : '';
    $tCarro = listarTabela('*', 'carro');
    foreach ($tCarro as $carroTabela) {
        $idProp = $carroTabela->idproprietario;
        if ($idProp == $grupo) {
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
        $retornoInsert = insertGlobal4('foto', 'idcarro,idproprietario,foto,cadastro', $carro, $grupo, $fotoPath, $data);

        if ($retornoInsert > 0) {
            echo json_encode(['success' => true, 'message' => "Foto cadastrada com sucesso!"]);
        } else {
            echo json_encode(['success' => false, 'message' => "Foto não cadastrada!"]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Falha ao mover a foto para o diretório de destino!']);
    }
} else {
    echo 'Nenhuma imagem enviada!!';
}

//echo json_encode($dados);