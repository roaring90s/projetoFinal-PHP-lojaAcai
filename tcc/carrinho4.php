<?php
session_start();
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
  <title>Carrinho de Compras</title>
  <style>
    html {
      scroll-behavior: smooth;
    }

    body {
      background: linear-gradient(45deg, #685080, #6545FF, #CC99FF);
      font-family: "Roboto", sans-serif;
      color: white;
    }

    .blur {
      backdrop-filter: blur(15px);
      background-color: rgba(255, 255, 255, 0.1);
    }
  </style>
</head>

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
          <a href="logout.php" class="nav-link">Logout<i class="bi bi-person-fill"></i></a>
        </div>
      </div>
    </div>
  </nav>
  <main>
    <div class="container py-5">
      <h1 class="text-center">Açaí + Creme de Iogurte Grego</h1>
    </div>
    <div class="container py-5">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-1">
        <div class="col">
          <div class="card blur">
            <img src="\ProjetoTCC\img\copo200.png" alt="copo 200ml">
            <div class="card-body bg-cards">
              <h5 class="card-title text-center">Copo de 200ML</h5>
              <p class="card-text text-center"><span class="badge bg-danger">R$
                  7,50</span></p>
              <p class="text-center"><a href="carrinho.php" class="btn btn-success"> <i class="bi bi-cart-plus"></i>
                  Adicionar ao carrinho</a></p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card blur">
            <img src="\ProjetoTCC\img\copo200.png" alt="copo 300ml">
            <div class="card-body">
              <h5 class="card-title text-center">Copo de 300ML</h5>
              <p class="card-text text-center"><span class="badge bg-danger"> R$ 10,50</span></p>
              <p class="text-center"><a href="carrinho.php" class="btn btn-success"> <i class="bi bi-cart-plus"></i>
                  Adicionar ao carrinho</a></p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card blur">
            <img src="\ProjetoTCC\img\copo200.png" alt="copo 400ml">
            <div class="card-body">
              <h5 class="card-title text-center">Copo de 400ML</h5>
              <p class="card-text text-center"><span class="badge bg-danger">R$ 13,50</span></p>
              <p class="text-center"><a href="carrinho.php" class="btn btn-success"> <i class="bi bi-cart-plus"></i>
                  Adicionar ao carrinho</a></p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card blur">
            <img src="\ProjetoTCC\img\copo500+.png" alt="">
            <div class="card-body">
              <h5 class="card-title text-center">Copo de 500ML</h5>
              <p class="card-text text-center"><span class="badge bg-danger">R$ 16,50</span></p>
              <p class="text-center"><a href="carrinho.php" class="btn btn-success"> <i class="bi bi-cart-plus"></i>
                  Adicionar ao carrinho</a></p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card blur">
            <img src="\ProjetoTCC\img\copo500+.png" alt="">
            <div class="card-body">
              <h5 class="card-title">Copo de 700ML</h5>
              <p class="card-text text-center"><span class="badge bg-danger">R$ 19,50</span></p>
              <p class="text-center"><a href="carrinho.php" class="btn btn-success"> <i class="bi bi-cart-plus"></i>
                  Adicionar ao carrinho</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php
  include('footer.php');
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>