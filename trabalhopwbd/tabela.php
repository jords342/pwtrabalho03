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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h1>Consulta - Pessoa</h1>
        <hr />
        <a href="index.php" class="btn btn-primary mb-2">Cadastrar</a>

        <table class="table table-bordered">
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
</body>

</html>