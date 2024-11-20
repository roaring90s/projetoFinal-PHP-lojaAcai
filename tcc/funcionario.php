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
    <title>Rochedo Açaí</title>
</head>
<style>
    .link {
        color: aliceblue;
    }

    .bg-cards {
        /* FUNDO DOS CARDS */
        color: white;
        background-color: rgb(49, 11, 85);
        box-shadow: black;
    }

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
            <h1 class="text-center m-4">Bem vindo a area de gestão de funcionarios <?php echo $nome_usuario; ?>!</h1>
            <div class="container py-4">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 py-0 ">
                    <div class="col text-center mb-4">
                        <div class="container ">
                            <div class="card bg-cards shadow-lg">
                                <div class="card-body ">
                                    <h5 class="card-title text-uppercase">Listar Funcionários</h5>
                                    <p class="card-text">Área destinada a listar informações sobre os funcionários da empresa.</p>
                                    <button class="btn btn-primary"><a href="listar_func.php" class="text-decoration-none link">MOSTRAR FUNCIONÁRIOS</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col text-center mb-4">
                        <div class="card bg-cards shadow-lg">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase text-center">ADICIONAR FUNCIONÁRIO</h5>
                                <p class="card-text">Área destinada a adicionar novos funcionários que foram contratados pela empresa.</p>
                                <button class="btn btn-primary"><a href="add_func.php" class="card-link text-decoration-none link">ADICIONAR</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-06 text-center mb-4 d-flex align-items-center">
                        <div class="card bg-cards shadow-lg">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase text-center">EXCLUIR FUNCIONÁRIOS</h5>
                                <p class="card-text">Área destinada excluir funcionários que já não trabalham mais na empresa.</p>
                                <button class="btn btn-primary"><a href="exc_func.php" class="card-link text-decoration-none link">EXCLUIR</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="col text-center mb-4">
                        <div class="card bg-cards shadow-lg">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase text-center">EDITAR FUNCIONÁRIO</h5>
                                <p class="card-text">Área destinada a editar informações de funcionários já existentes.</p>
                                <button class="btn btn-primary"><a href="edit_func.php" class="card-link text-decoration-none link">EDITAR</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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