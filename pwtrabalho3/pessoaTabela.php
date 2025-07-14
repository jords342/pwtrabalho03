<?php
include_once "crud/pessoaCRUD.php";
$registros = listarPessoas();
?>
<html>

<head>
    <meta charset="utf-8" />
    <title>Consulta de Pessoas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>

<body>
    <?php include_once "navegacao.php"; ?>
    <div class="container mt-4">
        <h1>Consulta - Pessoa</h1>
        <hr />
        <a href="pessoaFormulario.php" class="btn btn-primary mb-2">Cadastrar</a>
        <table class="table table-bordered" id="pessoaTable">
            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registros as $registro): ?>
                    <tr>
                        <td><?= $registro['nome']; ?></td>
                        <td><?= $registro['cpf']; ?></td>
                        <td><?= $registro['email']; ?></td>
                        <td style="width: 150px;">
                            <a href="pessoaFormulario.php?idPessoa=<?= $registro['idPessoa']; ?>"
                                class="btn btn-warning btn-sm">Editar</a>
                            <button class="btn btn-danger btn-sm"
                                onclick="confirmarExclusao(<?= $registro['idPessoa']; ?>)">Excluir</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#pessoaTable').DataTable({
                "language": { "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json" }
            });
        });
        function confirmarExclusao(codigo) {
            if (confirm('Confirma a exclusão do registro?')) {
                $.ajax({
                    url: 'pessoaExcluir.php', type: 'post', data: { idPessoa: codigo }
                }).done(function (resultado) {
                    if (resultado == 1) {
                        alert('Registro excluído com sucesso!'); window.location.reload();
                    } else {
                        alert('Erro ao excluir o registro. Tente novamente.');
                    }
                });
            }
        }
    </script>
</body>

</html>