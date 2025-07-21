<?php
include_once "crud/pessoaCRUD.php";
if (isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['email'])) {
    $cpfSemMascara = preg_replace('/[^0-9]/', '', $_POST['cpf']);
    $dados = [
        'idPessoa' => isset($_POST['idPessoa']) ? $_POST['idPessoa'] : 0,
        'nome' => $_POST['nome'],
        'cpf' => $cpfSemMascara,
        'email' => $_POST['email']
    ];
    $resultado = salvarPessoa($dados);
    if ($resultado > 0) {
        echo "<script>alert('Operação realizada com sucesso!'); window.location.replace('pessoaTabela.php');</script>";
    } else {
        echo "<script>alert('Erro ao salvar o registro. Nenhum dado foi alterado.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Dados incompletos.'); window.history.back();</script>";
}
?>