<?php
$conexao = new PDO('mysql:host=localhost; dbname=controleTreino', 'root', '');

$sql = "SELECT * FROM tbPessoa;";
$sentenca = $conexao->prepare($sql);
$sentenca->execute();
$registros = $sentenca->fetchAll();
$conexao = null;
?>

<html>

<head>
    <meta charset="utf-8" />
    <title>Pessoa</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
</head>

<body>
    <div class="container mt-4">
        <h1>Consulta - Pessoa</h1>
        <hr />
        <a href="index.php" class="btn btn-primary mb-2">Cadastrar</a>

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
                        <td><?php echo $registro['nome']; ?></td>
                        <td><?php echo $registro['cpf']; ?></td>
                        <td><?php echo $registro['email']; ?></td>
                        <td>
                            <a href="excluir.php?idPessoa=<?php echo $registro['idPessoa']; ?>" class="btn btn-danger btn-sm">Excluir</a>
                            <a href="index.php?idPessoa=<?php echo $registro['idPessoa']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#pessoaTable').DataTable();
        });
    </script>
</body>

</html>