<?php
include_once("./config/constantes.php");
include_once("./config/conexao.php");
include_once("./func/funcoes.php");
$valorNoCartao = 0;
$idcartao = 0;
$cliente = 0;
$result = 0;
$codigoCartao = 0;

$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if (isset($dados) && !empty($dados)) {
    $idcarro = isset($dados['idcompra']) ? addslashes($dados['idcompra']) : 0;
    $qtd = isset($dados['inQuantidade']) ? addslashes($dados['inQuantidade']) : 0;
    $precoV = isset($dados['precoVeiculo']) ? addslashes($dados['precoVeiculo']) : 0;
    $cartao = isset($dados['codCartao']) ? addslashes($dados['codCartao']) : '';

    if ($cartao !== '') {
        $compraCliente = listarTabela('*', 'cliente');
        foreach ($compraCliente as $cliente) {
            $numcartao = $cliente->numeroCartao;
            if ($numcartao === $cartao) {
                $codigoCartao = $cliente->numeroCartao;
                $valorNoCartao = $cliente->valorCartao;
            }
        }

        $total = $precoV * $qtd;
        if ($codigoCartao == '') {
            echo json_encode(['success' => false, 'message' => 'Cartão não existe']);
        } else if ($total > $valorNoCartao) {
            echo json_encode(['success' => false, 'message' => 'Compra não efetuada. Limite insuficiente!!']);
        } else if ($codigoCartao === $cartao) {
            $idcliente = $cliente->idcliente;

            $result = $valorNoCartao - $total;
            $retornoupdate = alterarGlobal1('cliente', 'valorCartao', "$result", 'numeroCartao', "$codigoCartao");
            $retornoInsert = insertGlobal6('compras', 'idcarro,idcliente,valorUnidade,qtdComprada,valorPago,cadastro', $idcarro, $idcliente, $precoV, $qtd, $total, DATATIMEATUAL);
            if ($retornoInsert > 0) {
                echo json_encode(['success' => true, 'message' => "Veículo comprado no cartão com sucesso"]);
            } else {
                echo json_encode(['success' => false, 'message' => "Veículo não comprado!"]);
            }
        } else {
            echo json_encode(['success' => false, 'message' => "Variável indefinida"]);
        }

    } else {
        $total = $precoV * $qtd;
        $retornoInsert = insertGlobal6('compras', 'idcarro,idcliente,valorUnidade,qtdComprada,valorPago,cadastro', "$idcarro", 'null', "$precoV", "$qtd", "$total", DATATIMEATUAL);
        if ($retornoInsert > 0) {
            echo json_encode(['success' => true, 'message' => "Veículo comprado no dinheiro com sucesso"]);
        } else {
            echo json_encode(['success' => false, 'message' => "Veículo não comprado!"]);
        }
    }
} else {
    echo json_encode((['success' => false, 'message' => 'Veículo não encontrado!']));
}

//echo json_encode($dados);