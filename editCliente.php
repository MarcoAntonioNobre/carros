<?php
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($Dados) && !empty($Dados)) {

//    echo json_encode($Dados);

    $id = isset($Dados['inpEditId']) ? addslashes($Dados['inpEditId']) : '';
    $nome = isset($Dados['inpEditNome']) ? addslashes($Dados['inpEditNome']) : '';
    $contato = isset($Dados['inpEditContato']) ? addslashes($Dados['inpEditContato']) : '';
    $uni = isset($Dados['inpEditValorUnitario']) ? addslashes($Dados['inpEditValorUnitario']) : '';
    $cartao = isset($Dados['inpEditValorCartao']) ? addslashes($Dados['inpEditValorCartao']) : '';

    $retornoInsert = alterarGlobal4('cliente', 'nomeCliente', 'contato', 'numeroCartao', 'valorCartao', $nome, $contato, $uni, $cartao, 'idcliente', $id);


    if ($retornoInsert = 1) {
        echo json_encode(['success' => true, 'message' => "Proprietário <b>$nome</b> cadastrado com sucesso"], JSON_THROW_ON_ERROR);

    } else {
        echo json_encode(['success' => false, 'message' => "Proprietário Não cadastrado! Error Bd"], JSON_THROW_ON_ERROR);
    }
} else {
    echo json_encode(['success' => false, 'message' => "Proprietário Não cadastrado! Error Variável"], JSON_THROW_ON_ERROR);

}
