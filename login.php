<?php
include_once("config/conexao.php");
include_once("config/constantes.php");
include_once("func/funcoes.php");
$conn = conectar();


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$cpf = $dados['cpf'];
$senha = $dados['senha'];
$options = [
    'cost' => 12,
];
$senhaHash = password_hash($senha, PASSWORD_BCRYPT, $options);

// $retornoValidar = verificarSenhaCriptografada('idadm, cpf, senha, ativo, cadastro, alteracao', 'adm', 'cpf', 'senha', $cpf, $senhaHash, 'ativo', 'A');
// if ($retornoValidar) {
//     if ($retornoValidar == 'usuario') {
//         echo json_encode(['success' => false, 'message' => 'Usúario Inválido!']);
//     } else if ($retornoValidar == 'senha') {
//         echo json_encode(['success' => false, 'message' => 'Senha Inválido!']);
//     } else {
//         $_SESSION['idadm'] = $retornoValidar->idadm;
//         // $_SESSION['cpf'] = $retornoValidar->nome;
//         // $_SESSION['email'] = $retornoValidar->email;
//         // $_SESSION['foto'] = $retornoValidar->foto;
//         echo json_encode(['success' => true, 'message' => 'Logado com sucesso!']);
//     }
// } else {
//     echo json_encode(['success' => false, 'message' => 'Usuário e Senha inválidos']);
// }
$teste = validarSenha('idadm, cpf, senha, ativo, cadastro, alteracao', 'adm','cpf','senha',"$cpf","$senha",'ativo',"A");

if($teste){
    echo json_encode(['success' => true, 'message' => 'Login realizado!']);
}
else{
    echo json_encode(['success' => false, 'message' => ' Não realizado o login!']);

}
