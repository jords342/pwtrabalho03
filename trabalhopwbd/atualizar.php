<?php
$idPessoa = isset($_POST['idPessoa']) ? $_POST['idPessoa'] : 0;
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];

$conexao = new PDO('mysql:host=localhost; dbname=controleTreino', 'root', '');

if ($idPessoa > 0) {
    $sql = "UPDATE tbPessoa SET nome = :nome, cpf = :cpf, email = :email WHERE idPessoa = :idPessoa;";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindValue(':nome', $nome);
    $sentenca->bindValue(':cpf', $cpf);
    $sentenca->bindValue(':email', $email);
    $sentenca->bindValue(':idPessoa', $idPessoa);
} else {
    $sql = "INSERT INTO tbPessoa(nome, cpf, email) VALUES(:nome, :cpf, :email);";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindValue(':nome', $nome);
    $sentenca->bindValue(':cpf', $cpf);
    $sentenca->bindValue(':email', $email);
}

$sentenca->execute();
$conexao = null;

if ($sentenca->rowCount() > 0) {
    echo "<script>alert('Cadastro realizado com sucesso!');</script>";
    echo "<script>window.location.replace('tabela.php');</script>";
} else {
    echo "<script>alert('Erro ao cadastrar ou atualizar registro');</script>";
    echo "<script>window.location.replace('index.php');</script>";
}
?>