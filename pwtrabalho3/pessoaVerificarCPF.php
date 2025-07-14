<?php
include_once "crud/pessoaCRUD.php";
if (isset($_POST['cpf'])) {
    $cpf = $_POST['cpf'];
    $idPessoa = isset($_POST['idPessoa']) ? $_POST['idPessoa'] : 0;
    $total = verificarCpfExistente($cpf, $idPessoa);
    if ($total == 0) {
        echo "true";
    } else {
        echo "false";
    }
}
?>