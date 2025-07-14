<?php
include_once "crud/tipoExercicioCRUD.php";
$idTipoExercicio = 0;
$nome = "";
if (isset($_GET['idTipoExercicio'])) {
    $idTipoExercicio = $_GET['idTipoExercicio'];
    $registro = buscarTipoExercicioPorId($idTipoExercicio);
    if ($registro) {
        $nome = $registro['nome'];
    }
}
?>
<html>

<head>
    <meta charset="utf-8">
    <title>Cadastro de Tipo de Exercício</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php include_once "navegacao.php"; ?>
    <div class="container mt-4">
        <h3><?= $idTipoExercicio > 0 ? 'Editar Tipo de Exercício' : 'Cadastrar Tipo de Exercício' ?></h3>
        <hr />
        <form id="formTipoExercicio" action="tipoExercicioSalvar.php" method="post">
            <input type="hidden" name="idTipoExercicio" value="<?= $idTipoExercicio; ?>">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="<?= $nome; ?>" required>
            </div>
            <a href="index.php" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#formTipoExercicio").validate({
                rules: {
                    nome: {
                        required: true,
                        remote: {
                            url: "tipoExercicioVerificarNome.php", type: "post",
                            data: {
                                nome: function () { return $("#nome").val(); },
                                idTipoExercicio: function () { return $("input[name='idTipoExercicio']").val(); }
                            }
                        }
                    }
                },
                messages: {
                    nome: {
                        required: "Por favor, informe o nome do exercício.",
                        remote: "Este nome de exercício já está cadastrado."
                    }
                }
            });
        });
    </script>
</body>

</html>