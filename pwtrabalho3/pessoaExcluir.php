<?php
include_once "crud/pessoaCRUD.php";
if (isset($_POST['idPessoa'])) {
    $resultado = excluirPessoa($_POST['idPessoa']);
    echo $resultado > 0 ? 1 : 0;
} else {
    echo 0;
}
?>