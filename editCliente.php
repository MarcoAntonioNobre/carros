<?php
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($Dados) && !empty($Dados)) {

//    echo json_encode($Dados);

    $id = isset($Dados['inpEditId']) ? addslashes(mb_strtoupper($Dados['inpEditId'], 'UTF-8')) : '';
    $nome = isset($Dados['inpEditNome']) ? addslashes(mb_strtoupper($Dados['inpEditNome'], 'UTF-8')) : '';
    $contato = isset($Dados['inpEditContato']) ? addslashes(mb_strtoupper($Dados['inpEditContato'], 'UTF-8')) : '';
    $uni = isset($Dados['inpEditValorUnitario']) ? addslashes(mb_strtoupper($Dados['inpEditValorUnitario'], 'UTF-8')) : '';
    $cartao = isset($Dados['inpEditValorCartao']) ? addslashes(mb_strtoupper($Dados['inpEditValorCartao'], 'UTF-8')) : '';

    $retornoInsert = alterarGlobal4('cliente', 'nomeCliente', 'contato', 'numeroCartao', 'valorCartao', $nome, $contato, $uni, $cartao, 'idcliente', $id);


    if ($retornoInsert = 1) {
        echo json_encode(['success' => true, 'message' => "Proprietário <b>$nome</b> cadastrado com sucesso"], JSON_THROW_ON_ERROR);

    } else {
        echo json_encode(['success' => false, 'message' => "Proprietário Não cadastrado! Error Bd"], JSON_THROW_ON_ERROR);
    }
} else {
    echo json_encode(['success' => false, 'message' => "Proprietário Não cadastrado! Error Variável"], JSON_THROW_ON_ERROR);

}
