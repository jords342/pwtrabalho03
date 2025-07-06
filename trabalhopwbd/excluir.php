<?php
$idPessoa = $_GET['idPessoa'];

$conexao = new PDO('mysql:host=localhost; dbname=controleTreino', 'root', '');

$sql = "DELETE FROM tbPessoa WHERE idPessoa = :idPessoa;";
$sentenca = $conexao->prepare($sql);
$sentenca->bindValue(':idPessoa', $idPessoa);

$sentenca->execute();
$conexao = null;

if ($sentenca->rowCount() > 0) {
    echo "<script>alert('Registro excluído com sucesso!');</script>";
} else {
    echo "<script>alert('Erro ao excluir registro');</script>";
}
echo "<script>window.location.replace('tabela.php');</script>";
?>