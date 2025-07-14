<?php
include_once 'BDCrud.php';

function salvarTipoExercicio($dados){
    $conexao = criarConexao();
    $sql = "";

    if (isset($dados['idTipoExercicio']) && $dados['idTipoExercicio'] > 0) {
        $sql = "UPDATE tbTipoExercicio SET nome = :nome WHERE idTipoExercicio = :idTipoExercicio;";
    } else {
        $sql = "INSERT INTO tbTipoExercicio(nome) VALUES(:nome);";
    }

    $sentenca = $conexao->prepare($sql);
    $sentenca->bindValue(':nome', $dados['nome']);
    if (isset($dados['idTipoExercicio']) && $dados['idTipoExercicio'] > 0) {
        $sentenca->bindValue(':idTipoExercicio', $dados['idTipoExercicio']);
    }

    $sentenca->execute();
    $conexao = null;
    return $sentenca->rowCount();
}

function listarTiposExercicio(){
    $conexao = criarConexao();
    $sql = "SELECT * FROM tbTipoExercicio;";
    $sentenca = $conexao->prepare($sql);
    $sentenca->execute();
    $registros = $sentenca->fetchAll();
    $conexao = null;
    return $registros;
}

function buscarTipoExercicioPorId($idTipoExercicio){
    $conexao = criarConexao();
    $sql = "SELECT * FROM tbTipoExercicio WHERE idTipoExercicio = :idTipoExercicio;";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindValue(':idTipoExercicio', $idTipoExercicio);
    $sentenca->execute();
    $registro = $sentenca->fetch();
    $conexao = null;
    return $registro;
}

function excluirTipoExercicio($idTipoExercicio){
    $conexao = criarConexao();
    $sql = "DELETE FROM tbTipoExercicio WHERE idTipoExercicio = :idTipoExercicio;";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindValue(':idTipoExercicio', $idTipoExercicio);
    $sentenca->execute();
    $conexao = null;
    return $sentenca->rowCount();
}

function verificarNomeExercicioExistente($nome, $idTipoExercicio = 0){
    $conexao = criarConexao();
    $sql = "SELECT COUNT(*) as total FROM tbTipoExercicio WHERE nome = :nome AND idTipoExercicio != :idTipoExercicio";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindValue(':nome', $nome);
    $sentenca->bindValue(':idTipoExercicio', $idTipoExercicio);
    $sentenca->execute();
    $resultado = $sentenca->fetch(PDO::FETCH_ASSOC);
    $conexao = null;
    return $resultado['total'];
}
?>