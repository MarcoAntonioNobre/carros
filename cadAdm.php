<?php
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($Dados) && !empty($Dados)) {

//    echo json_encode($Dados);

    $nome = isset($Dados['nomeAdm']) ? addslashes($Dados['nomeAdm']) : '';
    $dataHora = isset($Dados['dataTime']) ? addslashes($Dados['dataTime']) : '';
    $senha = isset($Dados['senhaAdm']) ? addslashes($Dados['senhaAdm']) : '';
    $cpf = isset($Dados['cpfAdm']) ? addslashes($Dados['cpfAdm']) : '';
    $senhaHash = criarSenhaHash($senha);
    $retornoInsert = insertGlobal4('adm', 'nomeAdm,cpf,senha,cadastro', $nome, $cpf,$senhaHash,$dataHora);

    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Proprietário <b>$nome</b> cadastrado com sucesso"], JSON_THROW_ON_ERROR);
    } else {
        echo json_encode(['success' => false, 'message' => "Proprietário Não cadastrado! Error Bd"], JSON_THROW_ON_ERROR);
    }
} else {
    echo json_encode(['success' => false, 'message' => "Proprietário Não cadastrado! Error Variável"], JSON_THROW_ON_ERROR);
}
