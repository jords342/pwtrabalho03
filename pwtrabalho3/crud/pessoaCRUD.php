<?php
include_once 'BDCrud.php';

function salvarPessoa($dados) {
    $conexao = criarConexao();
    if (isset($dados['idPessoa']) && $dados['idPessoa'] > 0) {
        $sql = "UPDATE tbPessoa SET nome = :nome, cpf = :cpf, email = :email WHERE idPessoa = :idPessoa;";
    } else {
        $sql = "INSERT INTO tbPessoa(nome, cpf, email) VALUES(:nome, :cpf, :email);";
    }
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindValue(':nome', $dados['nome']);
    $sentenca->bindValue(':cpf', $dados['cpf']);
    $sentenca->bindValue(':email', $dados['email']);
    if (isset($dados['idPessoa']) && $dados['idPessoa'] > 0) {
        $sentenca->bindValue(':idPessoa', $dados['idPessoa']);
    }
    $sentenca->execute();
    $conexao = null;
    return $sentenca->rowCount();
}

function listarPessoas() {
    $conexao = criarConexao();
    $sql = "SELECT * FROM tbPessoa;";
    $sentenca = $conexao->prepare($sql);
    $sentenca->execute();
    $registros = $sentenca->fetchAll();
    $conexao = null;
    return $registros;
}

function buscarPessoaPorId($idPessoa) {
    $conexao = criarConexao();
    $sql = "SELECT * FROM tbPessoa WHERE idPessoa = :idPessoa;";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindValue(':idPessoa', $idPessoa);
    $sentenca->execute();
    $registro = $sentenca->fetch();
    $conexao = null;
    return $registro;
}

function excluirPessoa($idPessoa) {
    $conexao = criarConexao();
    $sql = "DELETE FROM tbPessoa WHERE idPessoa = :idPessoa;";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindValue(':idPessoa', $idPessoa);
    $sentenca->execute();
    $conexao = null;
    return $sentenca->rowCount();
}

function verificarCpfExistente($cpf, $idPessoa = 0) {
    $conexao = criarConexao();
    
    $sql = "SELECT COUNT(*) as total FROM tbPessoa WHERE cpf = :cpf";

    if ($idPessoa > 0) {
        $sql .= " AND idPessoa != :idPessoa";
    }

    $sentenca = $conexao->prepare($sql);
    $sentenca->bindValue(':cpf', $cpf);

    if ($idPessoa > 0) {
        $sentenca->bindValue(':idPessoa', $idPessoa);
    }

    $sentenca->execute();
    $resultado = $sentenca->fetch(PDO::FETCH_ASSOC);
    $conexao = null;
    return $resultado['total'];
}
?>