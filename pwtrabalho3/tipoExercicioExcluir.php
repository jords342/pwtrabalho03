<?php
include_once "crud/tipoExercicioCRUD.php";
if (isset($_POST['idTipoExercicio'])) {
    $resultado = excluirTipoExercicio($_POST['idTipoExercicio']);
    echo $resultado > 0 ? 1 : 0;
} else {
    echo 0;
}
?>