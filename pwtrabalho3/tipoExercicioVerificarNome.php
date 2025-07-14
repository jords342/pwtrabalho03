<?php
include_once "crud/tipoExercicioCRUD.php";
if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $idTipoExercicio = isset($_POST['idTipoExercicio']) ? $_POST['idTipoExercicio'] : 0;
    $total = verificarNomeExercicioExistente($nome, $idTipoExercicio);
    if ($total == 0) {
        echo "true";
    } else {
        echo "false";
    }
}
?>