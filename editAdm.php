<?php
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($Dados) && !empty($Dados)) {

//    echo json_encode($Dados);


    $id = isset($Dados['idEditAdm']) ? addslashes($Dados['idEditAdm']) : '';
    $nome = isset($Dados['nomeEditAdm']) ? addslashes($Dados['nomeEditAdm']) : '';
    $cpf = isset($Dados['cpfEditAdm']) ? addslashes($Dados['cpfEditAdm']) : '';
    $senha = isset($Dados['senhaEditAdm']) ? addslashes($Dados['senhaEditAdm']) : '';
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
