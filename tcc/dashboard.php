<?php
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
    <!--íCONES DO BOOTSTRAP-->
    <link rel="icon" href="\ProjetoTCC\img\berry.png" type="image/x-icon" /> <!--�CONE DA P�GINA-->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!--LINK GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>Editar Perfil</title>
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
    <nav class="navbar bg-light navbar-expand-sm py-1 ">
        <div class="container">
            <a href="index.php" class="navbar-brand d-flex align-items-center">
                <img src="\ProjetoTCC\img\LOGO-Rochedo2.ai.png" alt="Logo Rochedo Açaí" height="20%" width="20%">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="menuNavbar">
                <div class="navbar-nav">
                    <a href="index.php" class="nav-link">Ínicio</a>
                    <a href="pedido.php" class="nav-link">Cardápio</a>
                    <a href="logout.php" class="nav-link">Logout <i class="bi bi-person-fill"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="text-center m-4">
            <h1>Seja Bem Vindo</h1>
            <h2><?php echo $nome_usuario; ?></h2>
        </div>
        <div class="container py-4">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 py-0">
                <div class="col text-center mb-4">
                    <div class="container ">
                        <div class="card bg-cards shadow-lg">
                            <div class="card-body ">
                                <h5 class="card-title text-uppercase">REGISTRAR VENDA</h5>
                                <p class="card-text">Aqui você pode registrar as vendas ou ver as vendas já realizadas.</p>
                                <button class="btn btn-primary"><a href="#" class="text-decoration-none link">ADICIONAR VENDAS</a></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col text-center mb-4">
                    <div class="card bg-cards shadow-lg">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase text-center">ESTOQUE</h5>
                            <p class="card-text">Aqui você pode ver todos os ingredientes e gerenciar estoque.</p>
                            <button class="btn btn-primary"><a href="#" class="card-link text-decoration-none link">ESTOQUE</a></button>
                        </div>
                    </div>
                </div>
                <div class="col col-md-06 text-center mb-4 d-flex align-items-center">
                    <div class="card bg-cards shadow-lg">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase text-center">FUNCIONÁRIOS</h5>
                            <p class="card-text">Aqui você pode gerenciar todos os funcionários.</p>
                            <div class="dropdown">
                                <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Gerenciar
                                </a>

                                <ul class="dropdown-menu bg-cards">
                                    <li><a class="dropdown-item bg-cards" href="listar_func.php">Listar Funcionários</a></li>
                                    <li><a class="dropdown-item bg-cards" href="add_func.php">Adicionar novo funcionário</a></li>
                                    <li><a class="dropdown-item bg-cards" href="edit_func.php">Editar funcionário</a></li>
                                    <li><a class="dropdown-item bg-cards" href="exc_func.php">Excluir funcionário</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-md-06 text-center mb-4 d-flex align-items-center">
                    <div class="card bg-cards shadow-lg">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase text-center">NOTAS FISCAIS</h5>
                            <p class="card-text">Gerenciamento das notas fiscais emitidas ao longo do dia.</p>
                            <div class="dropdown">
                                <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Gerenciar
                                </a>
                                <ul class="dropdown-menu bg-cards">
                                    <li><a class="dropdown-item bg-cards " href="listar_func.php">Emitir nota fiscal</a></li>
                                    <li><a class="dropdown-item bg-cards" href="add_func.php">Listar notas fiscais <span class="badge bg-primary">DIA</span></a></li>
                                    <li><a class="dropdown-item bg-cards" href="add_func.php">Listar notas fiscais <span class="badge bg-success">MÊS</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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