<?php
include 'conexao.php';
session_start();
$_SESSION['login'] = 'admin';
$nome_usuario = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--LINK DO BOOTSTRAP 5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--ÍCONES DO BOOTSTRAP-->
    <link rel="icon" href="\ProjetoTCC\img\berry.png" type="image/x-icon" /> <!--ÍCONE DA PÁGINA-->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!--LINK GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            /* CONFIGURAÇÃO DO CORPO DA PÁGINA */
            background: linear-gradient(45deg, #685080, #6545FF, #CC99FF);
            font-family: "Roboto", sans-serif;
            color: white;
            scroll-behavior: smooth;

        }
    </style>
    <title>Adicionar Funcionário</title>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <main>
        <div class="container">
            <h1 class="text-center mt-3 mb-1">Cadastro de Funcionários</h1>
            <form action="logica_add_fun.php" method="post" id="cadastroForm">
                <div class="mb-2">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do funcionário" required>
                </div>
                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF:</label>
                    <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF do funcionário" required>
                </div>
                <div class="mb-3">
                    <label for="endereco" class="form-label">Endereço:</label>
                    <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço do funcionário" required>
                </div>
                <div class="mb-3">
                    <label for="cargo" class="form-label">Cargo:</label>
                    <input type="text" class="form-control" name="cargo" id="cargo" placeholder="Cargo do funcionário" required>
                </div>
                <div class="mb-3">
                    <label for="salario" class="form-label">Salário:</label>
                    <input type="text" class="form-control" name="salario" id="salario" placeholder="Salário do funcionário" required>
                </div>
                <div class="mb-3">
                    <label for="sexo" class="form-label">Sexo:</label>
                    <input type="text" class="form-control" name="sexo" id="sexo" placeholder="Sexo do Funcionário" required>
                </div>
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone do funcionário" required>
                </div>
                <div class="mb-3">
                    <label for="telefone" class="form-label">Status do Funcionário:</label>
                    <input type="text" class="form-control" name="status" id="status" placeholder="Status do funcionário" required>
                </div>
                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-primary text-center">Cadastrar</button>
                </div>
            </form>
        </div>
    </main>
    <?php
    include 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!--SCRIPT PARA ALGUMAS INTERATIVIDADES DO BOOTSTRAP 5-->
</body>

</html>