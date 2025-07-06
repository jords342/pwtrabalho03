<?php
$idPessoa = 0;
$nome = "";
$cpf = "";
$email = "";

if (isset($_GET['idPessoa'])) {
    $idPessoa = $_GET['idPessoa'];

    $conexao = new PDO('mysql:host=localhost; dbname=controleTreino', 'root', '');
    $sql = "SELECT * FROM tbPessoa WHERE idPessoa = :idPessoa;";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindValue(':idPessoa', $idPessoa);
    $sentenca->execute();
    $registro = $sentenca->fetch();
    $conexao = null;

    if ($registro) {
        $nome = $registro['nome'];
        $cpf = $registro['cpf'];
        $email = $registro['email'];
    }
}
?>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <form action="atualizar.php" method="post">
            <input type="hidden" name="idPessoa" value="<?php echo $idPessoa; ?>">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>" placeholder="Nome">
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" class="form-control" value="<?php echo $cpf; ?>" placeholder="CPF">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="E-mail">
            </div>

            <a href="tabela.php" class="btn btn-primary">Voltar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</body>

</html>