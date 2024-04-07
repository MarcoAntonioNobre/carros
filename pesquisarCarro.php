<?php
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($Dados) && !empty($Dados)) {

    $inputPesquisa = isset($Dados['inputPesquisa']) ? addslashes($Dados['inputPesquisa']) : '';
    $retornoInsert = listarItemExpecificoPesquisa($inputPesquisa);


    if ($retornoInsert !== 'Vazio') {

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
        echo json_encode(['success' => false, 'message' => "Veículo não encontrado, tente novamente!"], JSON_THROW_ON_ERROR);
    }

} else {
    echo json_encode(['success' => false, 'message' => "Não encontramos! Error Variável"], JSON_THROW_ON_ERROR);
}

