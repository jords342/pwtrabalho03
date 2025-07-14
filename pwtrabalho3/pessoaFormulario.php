<?php
include_once "crud/pessoaCRUD.php";

$idPessoa = 0;
$nome = "";
$cpf = "";
$email = "";

if (isset($_GET['idPessoa'])) {
    $idPessoa = $_GET['idPessoa'];
    $registro = buscarPessoaPorId($idPessoa);
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
    <title>Cadastro de Pessoa</title>

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
        <h3><?= $idPessoa > 0 ? 'Editar Pessoa' : 'Cadastrar Pessoa' ?></h3>
        <hr />

        <form id="formPessoa" action="pessoaSalvar.php" method="post">
            <input type="hidden" name="idPessoa" value="<?= $idPessoa; ?>">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="<?= $nome; ?>" required>
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" id="cpf" class="form-control" value="<?= $cpf; ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= $email; ?>" required>
            </div>

            <a href="pessoaTabela.php" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#cpf').mask('000.000.000-00');

            $("#formPessoa").validate({
                rules: {
                    nome: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    cpf: {
                        required: true,
                        cpfBR: true,
                        remote: {
                            url: "pessoaVerificarCPF.php",
                            type: "post",
                            data: {
                                cpf: function () { return $("#cpf").val(); },
                                idPessoa: function () { return $("input[name='idPessoa']").val(); }
                            }
                        }
                    }
                },
                messages: {
                    nome: "Por favor, informe o nome.",
                    email: "Por favor, informe um e-mail válido.",
                    cpf: {
                        required: "Por favor, informe o CPF.",
                        cpfBR: "Por favor, informe um CPF válido.",
                        remote: "Este CPF já está cadastrado."
                    }
                }
            });
        });
    </script>
</body>

</html>