<?php
$conexao = null;

function criarConexao(){
    $conexao = new PDO('mysql:host=localhost; dbname=controleTreino', 'root', '');
    return $conexao;
}

function fecharConexao(){
    $conexao = null;
}
?>