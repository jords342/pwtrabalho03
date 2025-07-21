<?php
include_once "crud/pessoaCRUD.php";

if (isset($_POST['cpf'])) {

    $cpfSemMascara = preg_replace('/[^0-9]/', '', $_POST['cpf']);
    
    $idPessoa = isset($_POST['idPessoa']) ? $_POST['idPessoa'] : 0;
    
    $total = verificarCpfExistente($cpfSemMascara, $idPessoa);
    
    if ($total == 0) {
        echo "true";
    } else {
        echo "false";
    }
}
?>