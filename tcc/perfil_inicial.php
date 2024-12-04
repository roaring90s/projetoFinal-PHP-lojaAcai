<?php

include('protected.php');
include('navbar.php');
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
    <title>Perfil - Rochedo Açaí</title>
</head>
<style>
    body {
        background-color: #cb6ce6;
        color: white;

    }



    .fonte {
        font-family: "Merriweather", serif;
        font-weight: 900;
        color: white;
    }

    .carrinho:hover {
        transform: scale(130%);
        transition: all 0.9s ease-in-out;
    }

    .img {
        object-fit: cover;
    }

    .logo {
        height: 100px;
        width: 150px;
        margin-top: 10px;
        object-fit: contain;
    }

    .botao {
        background-color: transparent;
        border-radius: 25px;
        /* Borda arredondada */
        padding: 10px 25px;
        /* Espaçamento interno */
        font-size: 20px;
        /* Tamanho da fonte */
        cursor: pointer;
        /* Muda o cursor para indicar que é clicável */
        transition: all 1s ease;
        /* Transição suave ao passar o mouse */
        border: 2px solid;
        margin-bottom: 20px;
        border: 2px solid white;
    }

    .bt {
        align-items: center;
    }

    .botao a {
        text-decoration: none;
        color: white;
    }

    .botao:hover {
        background-color: #4d0d66;
        border: 2px solid white;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }

    .botao-principal {
        background-color: #4d0d56;
        /* Sem borda */
        border-radius: 25px;
        /* Borda arredondada */
        padding: 15px 30px;
        /* Espaçamento interno */
        font-size: 20px;
        /* Tamanho da fonte */
        font-weight: bold;
        /* Fonte em negrito */
        cursor: pointer;
        /* Muda o cursor para indicar que é clicável */
        transition: all 1s ease;
        /* Transição suave ao passar o mouse */
        text-decoration: none;
    }

    .botao-principal a {
        text-decoration: none;
        color: white;
    }

    .botao-principal:hover {
        transform: scale(1.2);
        background-color: #4d0d66;
        border: 2px solid white;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }
</style>

<body>
    
    <main>
        <div class="container" >
            <div class="row">
            <div class="col-md-4 d-flex justify-content-start m-0 ">
    <img src="\ProjetoTCC\img\acaicard.jpeg" alt="Açaí" class="img-fluid">
</div>
                <div class="col-md-6 text-center ">
                    <div class="container text-center">
                    <div class="container-fluid p-0">
    <img src="\ProjetoTCC\img\LOGO-Rochedo2.ai.png" alt="Logo Rochedo açaí" class="logo">
</div>
                        <h1 class="fonte mb-4">Seja bem-vindo <?php echo  $_SESSION['name']; ?>.</h1>
                        <h5 class="fonte mb-4">Qual sua fome hoje?</h5>
                        <div class="btn-group-vertical bt" role="group" aria-label="Basic example">
                            <button type="button" class=" botao-principal mb-4">Fazer pedido</button>
                            <button type="button" class=" botao mb-4 ">Editar seu perfil</button>
                            <button type="button" class=" botao mb-5">Histórico de pedidos</button>
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