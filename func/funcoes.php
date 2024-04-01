<?php

function listarTabela($campos, $tabela)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlListaTabelas = $conn->prepare("SELECT $campos FROM $tabela");
        //$sqlListaTabelas->bindValue(1, $campos, PDO::PARAM_INT);
        $sqlListaTabelas->execute();
        $conn->commit();
        if ($sqlListaTabelas->rowCount() > 0) {
            return $sqlListaTabelas->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';
    } catch
    (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function contaLinha($cont, $tabela,$quando,$idquando)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlListaTabelas = $conn->prepare("SELECT $cont FROM $tabela WHERE $quando = $idquando");
        //$sqlListaTabelas->bindValue(1, $campos, PDO::PARAM_INT);
        $sqlListaTabelas->execute();
        $conn->commit();
        if ($sqlListaTabelas->rowCount() > 0) {
            return $sqlListaTabelas->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';
    } catch
    (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}


function soma($campoSomar, $tabela, $idquando, $id)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlListaTabelas = $conn->prepare("SELECT $campoSomar FROM $tabela WHERE $idquando = $id");
        //$sqlListaTabelas->bindValue(1, $campos, PDO::PARAM_INT);
        $sqlListaTabelas->execute();
        $conn->commit();
        if ($sqlListaTabelas->rowCount() > 0) {
            return $sqlListaTabelas->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';
    } catch
    (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}


function listarItemExpecifico($campos, $tabela, $campoExpecifico, $valorCampo)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlListaTabelas = $conn->prepare("SELECT $campos FROM $tabela WHERE ? = ?");
//        $sqlListaTabelas->bindValue(1, $campos, PDO::PARAM_STR);
//        $sqlListaTabelas->bindValue(2, $tabela, PDO::PARAM_STR);
        $sqlListaTabelas->bindValue(1, $campoExpecifico, PDO::PARAM_STR);
        $sqlListaTabelas->bindValue(2, $valorCampo, PDO::PARAM_STR);
        $sqlListaTabelas->execute();
        $conn->commit();
        if ($sqlListaTabelas->rowCount() > 0) {
            return $sqlListaTabelas->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';
    } catch
    (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function listarSomaCartao($campos, $tabela, $campoExpecifico, $valorCampo)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlListaTabelas = $conn->prepare("SELECT $campos FROM $tabela WHERE ? <> ?");
//        $sqlListaTabelas->bindValue(1, $campos, PDO::PARAM_STR);
//        $sqlListaTabelas->bindValue(2, $tabela, PDO::PARAM_STR);
        $sqlListaTabelas->bindValue(1, $campoExpecifico, PDO::PARAM_STR);
        $sqlListaTabelas->bindValue(2, $valorCampo, PDO::PARAM_STR);
        $sqlListaTabelas->execute();
        $conn->commit();
        if ($sqlListaTabelas->rowCount() > 0) {
            return $sqlListaTabelas->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';
    } catch
    (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}


function listarSomaDinheiro($campos, $tabela, $campoExpecifico, $valorCampo)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlListaTabelas = $conn->prepare("SELECT $campos FROM $tabela WHERE ? = ?");
//        $sqlListaTabelas->bindValue(1, $campos, PDO::PARAM_STR);
//        $sqlListaTabelas->bindValue(2, $tabela, PDO::PARAM_STR);
        $sqlListaTabelas->bindValue(1, $campoExpecifico, PDO::PARAM_STR);
        $sqlListaTabelas->bindValue(2, $valorCampo, PDO::PARAM_STR);
        $sqlListaTabelas->execute();
        $conn->commit();
        if ($sqlListaTabelas->rowCount() > 0) {
            return $sqlListaTabelas->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';
    } catch
    (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function listarItemExpecificoPesquisa($valorCampo)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlListaTabelas = $conn->prepare("SELECT * FROM carro WHERE idcarro = ?");
//        $sqlListaTabelas->bindValue(1, $campos, PDO::PARAM_STR);
//        $sqlListaTabelas->bindValue(2, $tabela, PDO::PARAM_STR);
//        $sqlListaTabelas->bindValue(1, $campoExpecifico, PDO::PARAM_STR);
        $sqlListaTabelas->bindValue(1, $valorCampo, PDO::PARAM_STR);
        $sqlListaTabelas->execute();
        $conn->commit();
        if ($sqlListaTabelas->rowCount() > 0) {
            return $sqlListaTabelas->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';
    } catch
    (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function listarItemExpecificoPessoa($valorCampo)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlListaTabelas = $conn->prepare("SELECT * FROM proprietario WHERE idproprietario = ?");
//        $sqlListaTabelas->bindValue(1, $campos, PDO::PARAM_STR);
//        $sqlListaTabelas->bindValue(2, $tabela, PDO::PARAM_STR);
//        $sqlListaTabelas->bindValue(1, $campoExpecifico, PDO::PARAM_STR);
        $sqlListaTabelas->bindValue(1, $valorCampo, PDO::PARAM_STR);
        $sqlListaTabelas->execute();
        $conn->commit();
        if ($sqlListaTabelas->rowCount() > 0) {
            return $sqlListaTabelas->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';
    } catch
    (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function listarTabelaOrdenada($campos, $tabela, $campoOrdem, $ASCouDESC)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos FROM $tabela ORDER BY $campoOrdem $ASCouDESC");
        //        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';

    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function listarTabelaInnerJoin($campos, $tabela1, $tabela2, $id1, $id2, $ordem, $tipoOrdem)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos FROM $tabela1 t INNER JOIN $tabela2 y ON t.$id1 = y.$id2 ORDER BY $ordem $tipoOrdem");
        //        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';

    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function listarTabelaInnerJoinTriplo($campos, $tabela1, $tabela2, $tabela3, $id1, $id2, $id3, $id4, $ordem, $tipoOrdem)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos FROM $tabela1 t INNER JOIN $tabela2 y ON t.$id1 = y.$id2 INNER JOIN $tabela3 i ON t.$id3 = i.$id4 ORDER BY $ordem $tipoOrdem");
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';

    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function listarTabelaInnerJoinTriploWhere($campos, $tabela1, $tabela2, $tabela3, $id1, $id2, $id3, $id4,$quando,$idquando, $ordem, $tipoOrdem)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos FROM $tabela1 t INNER JOIN $tabela2 y ON t.$id1 = y.$id2 INNER JOIN $tabela3 i ON t.$id3 = i.$id4 WHERE y.$quando = $idquando ORDER BY t.$ordem $tipoOrdem");
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';

    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}



function listarTabelaInnerJoinTriploValorPago($camposSomar, $tabela1, $tabela2, $tabela3, $id1, $id2, $id3, $id4, $identificadorWhere, $idWhere)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT sum($camposSomar) as soma FROM $tabela1 t INNER JOIN $tabela2 y ON t.$id1 = y.$id2 INNER JOIN $tabela3 i ON t.$id3 = i.$id4 WHERE $identificadorWhere = $idWhere");
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';

    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function ativar($tabela, $campo, $ativo, $condicao)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlListaTabelas = $conn->prepare("UPDATE $tabela SET $campo = '$ativo' WHERE $condicao");
        //$sqlListaTabelas->bindValue(1, $email, PDO::PARAM_INT);
        $sqlListaTabelas->execute();
        $conn->commit();
        if ($sqlListaTabelas->rowCount() > 0) {
            return $sqlListaTabelas->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';

    } catch
    (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function insertGlobal2($tabela, $dados, $novosDados1, $novosDados2)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("INSERT INTO $tabela($dados) VALUES ('$novosDados1','$novosDados2')");
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';

    } catch (PDOException $e) {
        echo 'Exception -> ';
        $conn->rollback();
        return ($e->getMessage());
    }
    $conn = null;
}

function insertGlobal1($tabela, $dados, $novosDados1)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("INSERT INTO $tabela($dados) VALUES ('$novosDados1')");
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';

    } catch (PDOException $e) {
        echo 'Exception -> ';
        $conn->rollback();
        return ($e->getMessage());
    }
    $conn = null;
}

function insertGlobal5($tabela, $dados, $novosDados1, $novosDados2, $novosDados3, $novosDados4, $novosDados5)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("INSERT INTO $tabela($dados) VALUES (?,?,?,?,?)");
        $sqlLista->bindValue(1, $novosDados1, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $novosDados2, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $novosDados3, PDO::PARAM_STR);
        $sqlLista->bindValue(4, $novosDados4, PDO::PARAM_STR);
        $sqlLista->bindValue(5, $novosDados5, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        }
    } catch (PDOException $e) {
        echo 'Exception -> ';
        $conn->rollback();
        return ($e->getMessage());
    }
    $conn = null;
}

function insertGlobal6($tabela, $dados, $novosDados1, $novosDados2, $novosDados3, $novosDados4, $novosDados5, $novosDados6)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("INSERT INTO $tabela($dados) VALUES (?,?,?,?,?,?)");
        $sqlLista->bindValue(1, $novosDados1, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $novosDados2, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $novosDados3, PDO::PARAM_STR);
        $sqlLista->bindValue(4, $novosDados4, PDO::PARAM_STR);
        $sqlLista->bindValue(5, $novosDados5, PDO::PARAM_STR);
        $sqlLista->bindValue(6, $novosDados6, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        }
    } catch (PDOException $e) {
        echo 'Exception -> ';
        $conn->rollback();
        return ($e->getMessage());
    }
    $conn = null;
}

function insertGlobal4($tabela, $dados, $novosDados1, $novosDados2, $novosDados3, $novosDados4)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("INSERT INTO $tabela($dados) VALUES (?,?,?,?)");
        $sqlLista->bindValue(1, $novosDados1, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $novosDados2, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $novosDados3, PDO::PARAM_STR);
        $sqlLista->bindValue(4, $novosDados4, PDO::PARAM_STR);

        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        }
    } catch (PDOException $e) {
        echo 'Exception -> ';
        $conn->rollback();
        return ($e->getMessage());
    }
    $conn = null;
}


function deletecadastro($tabela, $NomeDoCampoId, $id)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("DELETE FROM $tabela WHERE $NomeDoCampoId = ? ");
        $sqlLista->bindValue(1, $id, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return true;
        } else {
            return null;
        }
    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}

function alterarGlobal1($tabela, $campo, $valor, $identificar, $id)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("UPDATE $tabela SET $campo = '$valor' WHERE  $identificar = $id ;");
        //        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        };
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

function alterarGlobal2($tabela, $campo, $campo2, $valor, $valor2, $identificar, $id)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("UPDATE $tabela SET $campo = '$valor',$campo2 = '$valor2' WHERE  $identificar = $id ;");
        //        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_INT);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        };
    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

function alterarGlobal4($tabela, $campo1, $campo2, $campo3, $campo4, $valor, $valor2, $valor3, $valor4, $identificar, $id)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("UPDATE $tabela SET $campo1 = ?, $campo2 = ?, $campo3 = ?,$campo4 = ? WHERE  $identificar = $id ;");
//        $sqlLista->bindValue(1, $campo1, PDO::PARAM_STR);
        $sqlLista->bindValue(1, $valor, PDO::PARAM_STR);
//        $sqlLista->bindValue(3, $campo2, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $valor2, PDO::PARAM_STR);
//        $sqlLista->bindValue(5, $campo3, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $valor3, PDO::PARAM_STR);
//        $sqlLista->bindValue(7, $campo4, PDO::PARAM_STR);
        $sqlLista->bindValue(4, $valor4, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';

    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

function alterarGlobal5($tabela, $campo1, $campo2, $campo3, $campo4, $campo5, $valor, $valor2, $valor3, $valor4, $valor5, $identificar, $id)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("UPDATE $tabela SET $campo1 = ?, $campo2 = ?, $campo3 = ?,$campo4 = ?,$campo5 = ? WHERE  $identificar = $id ;");
//        $sqlLista->bindValue(1, $campo1, PDO::PARAM_STR);
        $sqlLista->bindValue(1, $valor, PDO::PARAM_STR);
//        $sqlLista->bindValue(3, $campo2, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $valor2, PDO::PARAM_STR);
//        $sqlLista->bindValue(5, $campo3, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $valor3, PDO::PARAM_STR);
//        $sqlLista->bindValue(7, $campo4, PDO::PARAM_STR);
        $sqlLista->bindValue(4, $valor4, PDO::PARAM_STR);
        $sqlLista->bindValue(5, $valor5, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';

    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

function alterarGlobal3($tabela, $campo1, $campo2, $campo3, $valor, $valor2, $valor3, $identificar, $id)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("UPDATE $tabela SET $campo1 = ?, $campo2 = ?, $campo3 = ? WHERE  $identificar = $id ;");
//        $sqlLista->bindValue(1, $campo1, PDO::PARAM_STR);
        $sqlLista->bindValue(1, $valor, PDO::PARAM_STR);
//        $sqlLista->bindValue(3, $campo2, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $valor2, PDO::PARAM_STR);
//        $sqlLista->bindValue(5, $campo3, PDO::PARAM_STR);
        $sqlLista->bindValue(3, $valor3, PDO::PARAM_STR);

        $sqlLista->execute();
        $conn->commit();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        }
        return 'Vazio';

    } catch (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}

function verificarSenhaCriptografada($campos, $tabela, $campoBdEmail, $campoEmail, $campoBdSenha, $campoSenha, $campoBdAtivo, $campoAtivo)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlverificar = $conn->prepare("SELECT $campos FROM $tabela WHERE $campoBdEmail = ? AND $campoBdAtivo = ?");
        $sqlverificar->bindValue(1, $campoEmail, PDO::PARAM_STR);
        $sqlverificar->bindValue(2, $campoAtivo, PDO::PARAM_STR);
        $sqlverificar->execute();
        $conn->commit();
        if ($sqlverificar->rowCount() > 0) {
            $retornoSql = $sqlverificar->fetch(PDO::FETCH_OBJ);
            $senha_hash = $retornoSql->$campoBdSenha;
            if (password_verify($campoSenha, $senha_hash)) {
                return $retornoSql;
            } else {
                return 'senha';
            }
        } else {
            return 'usuario';
        }
    } catch (Throwable $e) {
        $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
        $error_message .= 'Line: ' . $e->getLine() . PHP_EOL;
        error_log($error_message, 3, 'log/arquivo_de_log.txt');
        $conn->rollback();
        return 'Exception -> ' . $e->getMessage();
    } finally {
        $conn = null;
    }
}

function dataHoraGlobal($data, $hora = 'S', $pais = 'BR')
{
    $data = new DateTime($data);
    if ($pais === 'BR') {
        if ($hora === 'S') {
            echo $data->format('Y-m-d H:i:s');
        } else {
            echo $data->format('Y-m-d');
        }
    } else if ($pais === 'US') {
        if ($hora === 'S') {
            echo $data->format('d-m-Y H:i:s');
        } else {
            echo $data->format('d-m-Y');
        }
    }
    return $data;
}

function conversorDBNum($numm)
{
    $numero = $numm;
    $numero = number_format($numero, 2, ',', '');
    return $numero;
}

function conversorDBNumPonto($numm)
{
    $numero = $numm;
    return number_format($numero, 2, '.', '');
}

function converterAcentuacao($str)
{
    $trMap = ['Á' => 'á', 'É' => 'é', 'Í' => 'í', 'Ó' => 'ó', 'Ú' => 'ú', 'Ã' => 'ã', 'Õ' => 'õ', 'Â' => 'â', 'Ê' => 'ê', 'Î' => 'î', 'Ô' => 'ô', 'Û' => 'û', 'À' => 'à', 'È' => 'è', 'Ì' => 'ì', 'Ò' => 'ò', 'Ù' => 'ù'];
    $str = mb_strtolower(strtr($str, $trMap));
    $first = mb_substr($str, 0, 1);
    $first = strtr($first, array_flip($trMap));
    $first = mb_strtoupper($first);
    return $first . mb_substr($str, 1);
}

function criarSenhaHash($senha, $valorCost = '12')
{
    $options = [
        'cost' => $valorCost,
    ];
    return password_hash($senha, PASSWORD_BCRYPT, $options);
}

{

}