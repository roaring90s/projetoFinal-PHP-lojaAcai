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
    .font {
      text-align: center;
      border-right: 4px solid;
      -webkit-background-clip: text;
      text-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
      font-size: 2.5rem;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 26ch;
      overflow: hidden;
      animation: animatext 0.9s linear infinite, anima steps(26) 2s;
      white-space: nowrap;
      
    }

    .text {
      position: relative;
    }

    .bg-cards {
      /* FUNDO DOS CARDS */
      color: white;
      background-color: rgb(49, 11, 85);
      box-shadow: black;
    }

    .map-container {
      /* CAIXA DO MAPA DE LOCALIZAÇÃO */
      position: relative;
      width: 100%;
      padding-bottom: 56.25%;
      height: 0;
      overflow: hidden;
      max-width: 100%;

    }

    .map-container iframe {
      /* CONFIGURAÇÃO DO MAPA  */
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }

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

    @keyframes animatext {
      50% {
        border-right: transparent;
      }
    }

    @keyframes anima {
      0% {
        width: 0;
      }

    }
  </style>
  <title>Rochedo Açaí</title>
</head>

<body>
  <?php
  include 'navbar.php';
  ?>
  <main>
    <!--===============================================================IMAGEM PRINCIPAL===============================================================================-->
    <div class="text">
      <h1 class="font animatext"> O sabor da fruta, direto pra você.</h1>
      <img src="\ProjetoTCC\img\fotoprincipal.webp" alt="Açaí delicioso" class="img-fluid">
    </div>
    <!--=================================================================CARDS PÁGINA PRINCIPAL=======================================================================-->
    <div class="container py-4">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 py-0">
        <div class="col text-center mb-4">
          <div class="container align-">
            <div class="card bg-cards shadow-lg">
              <div class="card-body ">
                <h5 class="card-title text-uppercase">O melhor açaí do df</h5>
                <p class="card-text">o Rochedo Açaí tem o compromisso de oferecer o melhor açaí que seu dinheiro pode
                  pagar!</p>
                <i class="bi bi-award medalha"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col text-center mb-4">
          <div class="card bg-cards shadow-lg">
            <div class="card-body">
              <h5 class="card-title text-uppercase text-center">Peça pelo nosso Whatsapp</h5>
              <p class="card-text">Cansado de ter que ir até o local pedir? pois temos a solução pra você!</p>
              <a href="" class="card-link "><i class="bi bi-whatsapp "></i></a>
            </div>
          </div>
        </div>
        <div class="col col-md-06 text-center mb-4 d-flex align-items-center">
          <div class="card bg-cards shadow-lg">
            <div class="card-body">
              <h5 class="card-title text-uppercase text-center">SEJA FIDELIDADE</h5>
              <p class="card-text">Clientes fidelizados ganham descontos exclusivos e tem vantagens especiais.</p>
              <i class="bi bi-coin"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <hr>
  <!--============================================================================FIM DOS CARDS=========================================================================-->
  <!--==========================================================================MAPA RESPONSIVO=========================================================================-->
  <div class="container">
    <div class="row">
      <div class="col-md-6 d-flex align-items-center">
        <div class="p-4">
          <div class="card bg-cards shadow-lg">
            <div class="card-body">
              <h5 class="card-title text-uppercase text-center">desconto primeira compra</h5>
              <p class="card-text text-center">É sua primeira vez por aqui? Pois você tem um desconto especial conosco,
                crie sua conta agora e aproveite o melhor açaí da sua vida naquele precinho especial.</p>
              <p class="text-center"><i class="bi bi-currency-dollar"></i></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <h4 class="text-center">Nossa localização:</h4>
        <div class="map-container">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3837.9013839571035!2d-48.028071224156704!3d-15.861779584787971!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935a2d00373b8431%3A0x272f21657ffde5b4!2zUm9jaGVkbyBhw6dhw60!5e0!3m2!1spt-BR!2sbr!4v1723861296547!5m2!1spt-BR!2sbr"
            width="100%" height="100%" frameborder="1" style="border:0;" allowfullscreen=""></iframe>
        </div>
      </div>
    </div>
  </div>

  <br>
  <?php
  include('footer.php');
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <!--SCRIPT PARA ALGUMAS INTERATIVIDADES DO BOOTSTRAP 5-->
</body>

</html>