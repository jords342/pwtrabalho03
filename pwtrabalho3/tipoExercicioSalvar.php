<?php
include_once "crud/tipoExercicioCRUD.php";
if (isset($_POST['nome'])) {
    $dados = [
        'idTipoExercicio' => isset($_POST['idTipoExercicio']) ? $_POST['idTipoExercicio'] : 0,
        'nome' => $_POST['nome']
    ];
    $resultado = salvarTipoExercicio($dados);
    if ($resultado > 0) {
        echo "<script>alert('Operação realizada com sucesso!'); window.location.replace('index.php');</script>";
    } else {
        echo "<script>alert('Erro ao salvar o registro. Nenhum dado foi alterado.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Dados incompletos.'); window.history.back();</script>";
}
?>