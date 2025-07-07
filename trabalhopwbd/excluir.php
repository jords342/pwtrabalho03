<?php
$idPessoa = $_POST['idPessoa'];

$conexao = new PDO('mysql:host=localhost; dbname=controleTreino', 'root', '');

$sql = "DELETE FROM tbPessoa WHERE idPessoa = :idPessoa;";
$sentenca = $conexao->prepare($sql);
$sentenca->bindValue(':idPessoa', $idPessoa);

$sentenca->execute();
$conexao = null;

if ($sentenca->rowCount() > 0) {
    echo 1;
} else {
    echo 0;
}
?>
