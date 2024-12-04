<?php
include 'conexao.php';

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
    <title>Rochedo Açaí</title>
</head>
<style>
    body {
        /* CONFIGURAÇÃO DO CORPO DA PÁGINA */
        background: linear-gradient(45deg, #685080, #6545FF, #CC99FF);
        font-family: "Roboto", sans-serif;
        color: white;
    }
</style>

<body>
    <?php
    include 'navbar.php';
    ?>
    <main>
        <div class="container">
            <h1 class="text-center mt-3 mb-3">Lista de Funcionários</h1>
            <table class="table table-dark table-striped text-center">
                <thead>
                    <tr>
                        <th class="col">Id</th>
                        <th class="col">Nome</th>
                        <th class="col">CPF</th>
                        <th class="col">Endereço</th>
                        <th class="col">Cargo</th>
                        <th class="col">Salário</th>
                        <th class="col">Sexo</th>
                        <th class="col">Telefone</th>
                        <th class="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM funcionario";
                    $resultado = $conexao->query(query: $sql);

                    if ($resultado->num_rows > 0) {
                        while ($row = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["idfuncionario"] . "</td>";
                            echo "<td>" . $row["nome"] . "</td>";
                            echo "<td>" . $row["cpf"] . "</td>";
                            echo "<td>" . $row["endereco"] . "</td>";
                            echo "<td>" . $row["cargo"] . "</td>";
                            echo "<td>" . "R$ " . $row["salario"] .  "</td>";
                            echo "<td>" . $row["sexo"] . "</td>";
                            echo "<td>" . $row["telefone"] . "</td>";
                            echo "<td>" . $row["status"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'> Nenhum funcionário encontrado. </td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <?php
    include('footer.php');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!--SCRIPT PARA ALGUMAS INTERATIVIDADES DO BOOTSTRAP 5-->
</body>

</html>