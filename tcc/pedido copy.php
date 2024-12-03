<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();

include('verificar_login.php');

?>





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
  <title>Cardápio - Rochedo Açaí</title>
  <style>
    html {
      scroll-behavior: smooth;

    }

    body {
      background: linear-gradient(45deg, #685080, #6545FF, #CC99FF);
      font-family: "Roboto", sans-serif;
      object-fit: cover;
    }

    .blur {
      backdrop-filter: blur(15px);
      background-color: rgba(255, 255, 255, 0.1);
    }

    .card {
      width: 100%;
      height: 100%;
      object-fit: cover;
      color: white;
      background-color: rgb(49, 11, 85);
      box-shadow: black;
    }

    .anima {
      animation: animacao_scroll linear;
      animation-timeline: view();
      animation-range: entry 0% cover 40%;
    }

    @keyframes animacao_scroll {
      0% {
        opacity: 0;
        transform: translate(-150px);
      }

      50% {
        opacity: 0.5;
        transform: translate(-75px);
      }

      100% {
        opacity: 1;
        transform: translate(0px);
      }
    }
  </style>
</head>

<body>
  <?php
  include 'navbar.php';
  ?>
  <main>
    <!--============================================PARTE PRINCIPAL DO SITE==========================================-->
    <div class=" container py-4">
      <div class="alert alert-danger">
        <h4 class="alert-heading"><i class="bi-info-circle"> INFORMAÇÃO </i></h4>
        <p>A quantidade de alguns acompanhamentos pode mudar de acordo com a opção de açaí selecionado.</p>
        <button class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    </div>
    <div class="container py-5">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-1">
        <div class="col">
          <div class="card blur anima">
            <img src="\ProjetoTCC\img\acaicard.jpeg" alt="Açaí com frutas" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Açaís Premium</h5>
              <p class="card-text">+02 Acompanhamentos a partir de <span class="badge bg-danger">R$
                  7,50</span></p>
              <a href="opcoes_copo.php" class="btn btn-primary">Ver opções</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card blur anima">
            <img src="\ProjetoTCC\img\acaisuper.jpeg" alt="Açaí com frutas" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Açaís Super Premium</h5>
              <p class="card-text">A partir de <span class="badge bg-danger"> R$ 9,00</span></p>
              <a href="opcoes_copo.php" class="btn btn-primary">Ver opções</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card blur anima">
            <img src="\ProjetoTCC\img\barcacai.jpeg" alt="Açaí com frutas" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Barca de Açaí</h5>
              <p class="card-text">+04 Acompanhamento, 2 frutas e 2 coberturas por <span
                  class="badge bg-danger">R$ 27,00</span></p>
              <a href="opcoes_copo.php" class="btn btn-primary">Ver opções</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card blur anima">
            <img src="\ProjetoTCC\img\background.jpg" alt="Açaí com frutas" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Açaí + Creme de Iogurte Grego</h5>
              <p class="card-text">A partir de <span class="badge bg-danger">R$ 8,50</span></p>
              <a href="opcoes_copo.php" class="btn btn-primary">Ver opções</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card blur anima">
            <img src="\ProjetoTCC\img\acaiPURO.jpeg" alt="Açaí com frutas" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Açaí Puro (ZERO AÇUCAR)</h5>
              <p class="card-text">A partir de <span class="badge bg-danger">R$ 9,00</span></p>
              <a href="opcoes_copo.php" class="btn btn-primary">Ver opções</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card blur anima">
            <img src="\ProjetoTCC\img\acaisorbet.jpeg" alt="Açaí com frutas" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Açaí Premium + Sorbet ZERO LACTOSE de Maracujá ou Frutas Vermelhas
              </h5>
              <p class="card-text">A partir de <span class="badge bg-danger">R$ 9,00</span></p>
              <a href="opcoes_copo.php" class="btn btn-primary">Ver opções</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card blur anima">
            <img src="\ProjetoTCC\img\AÇAI1.jpg" alt="Açaí com frutas" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Açaí na Tigela 500ml</h5>
              <p class="card-text">+03 Acompanhamentos, 1 fruta e 2 coberturas por <span
                  class="badge bg-danger">R$ 19,90</span></p>
              <a href="opcoes_copo.php" class="btn btn-primary">Ver opções</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card blur anima">
            <img src="\ProjetoTCC\img\milksandshakes.jpeg" alt="Açaí com frutas" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Milkshakes</h5>
              <p class="card-text">Ovomaltine ou Morango a partir de <span class="badge bg-danger">R$
                  12,50</span> </p>
              <a href="opcoes_copo.php" class="btn btn-primary">Ver opções</a>
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