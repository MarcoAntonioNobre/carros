<?php
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($Dados) && !empty($Dados)) {
//    echo json_encode($Dados);

    $inputPesquisa = isset($Dados['inputPesquisa']) ? addslashes(mb_strtoupper($Dados['inputPesquisa'], 'UTF-8')) : '';
    $retornoInsert = listarItemExpecificoPesquisa($inputPesquisa);
    if ($retornoInsert > 0) {

        foreach ($retornoInsert as $objeto) {
            $idcarro = $objeto->idcarro;
            $idproprietario = $objeto->idproprietario;
            $nomeCarro = $objeto->nomeCarro;
            $diferenciais = $objeto->diferenciais;
            $fotoPerfil = $objeto->fotoPerfil;
            $preco = $objeto->preco;
            $precoConvertido = conversorDBNum($preco);
            $nomeCarro = mb_strtolower($nomeCarro);
            $nomeCarro = converterAcentuacao($nomeCarro);
            $diferenciais = mb_strtolower($diferenciais);
            $diferenciais = converterAcentuacao($diferenciais);
        }

        echo json_encode(["success" => true, "message" => "Encontramos", "idcarro" => "$idcarro", "idproprietario" => "$idproprietario", "nomeCarro" => "$nomeCarro", "diferenciais" => "$diferenciais", "fotoPerfil" => "$fotoPerfil", "preco" => "$preco",], JSON_THROW_ON_ERROR);

    } else {
        echo json_encode(['success' => false, 'message' => "Não encontramos! Error Bd"], JSON_THROW_ON_ERROR);
    }
} else {
    echo json_encode(['success' => false, 'message' => "Não encontramos! Error Variável"], JSON_THROW_ON_ERROR);
}



//    foreach ($retornoInsert as $carroRet){
//      $idcarro = $carroRet ->idcarro;
//      $nomeCarro = $carroRet ->nomeCarro;
//      $preco = $carroRet ->preco;
//    }
//<div class='row d-flex justify-content-center align-items-center'>
//<div class='col-lg-4 col-md-4 col-12 '>
//<div class='card mt-4' >
//<div class='card-body text-center'>
//<h5 class='card-title'>j</h5>
//<button type='submit' class='btn btn-outline-dark' data-bs-toggle='modal' onclick='abrirModalCompra('>','')'>
//Ver Mais
//</button>
//</div></div></div></div>