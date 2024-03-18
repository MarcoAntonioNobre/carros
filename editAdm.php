<?php
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($Dados) && !empty($Dados)) {

//    echo json_encode($Dados);


    $id = isset($Dados['idEditAdm']) ? addslashes(mb_strtoupper($Dados['idEditAdm'], 'UTF-8')) : '';
    $nome = isset($Dados['nomeEditAdm']) ? addslashes(mb_strtoupper($Dados['nomeEditAdm'], 'UTF-8')) : '';
    $cpf = isset($Dados['cpfEditAdm']) ? addslashes(mb_strtoupper($Dados['cpfEditAdm'], 'UTF-8')) : '';
    $senha = isset($Dados['senhaEditAdm']) ? addslashes(mb_strtoupper($Dados['senhaEditAdm'], 'UTF-8')) : '';
    $senhaHash = criarSenhaHash($senha);

    $retornoInsert = alterarGlobal3('adm', 'nomeAdm', 'cpf', 'senha',$nome, $cpf, $senhaHash, 'idadm', $id);


    if ($retornoInsert = 1) {
        echo json_encode(['success' => true, 'message' => "Proprietário <b>$nome</b> cadastrado com sucesso"], JSON_THROW_ON_ERROR);

    } else {
        echo json_encode(['success' => false, 'message' => "Proprietário Não cadastrado! Error Bd"], JSON_THROW_ON_ERROR);
    }
} else {
    echo json_encode(['success' => false, 'message' => "Proprietário Não cadastrado! Error Variável"], JSON_THROW_ON_ERROR);

}
