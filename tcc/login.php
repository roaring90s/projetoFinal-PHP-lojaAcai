<?php
if(!isset($_SESSION)){
    session_start();
}

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
  <link rel="icon" href="\ProjetoTCC\img\login1.svg" type="image/x-icon" /> <!--ÍCONE DA PÁGINA-->
  <link rel="preconnect" href="https://fonts.googleapis.com"> <!--LINK GOOGLE FONTS-->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
  <title>Login - Rochedo Açaí</title>
  <style>
    body {
      /* CONFIGURAÇÃO DO CORPO DA PÁGINA */
      background: linear-gradient(45deg, #685080, #6545FF, #CC99FF);
      font-family: "Roboto", sans-serif;
      color: white;
    }

    .link {
      color: aliceblue;
    }

    .blurbox {
      background-color: rgba(255, 255, 255, 0.1);
      /* Branco com 20% de opacidade */
      padding: 15px;
      /* Espaçamento interno */
      border-radius: 40px;
      /* Borda arredondada */
      box-shadow: inset 0px 2px 4px rgba(0, 0, 0, 0.2);
      position: relative;
    }

    .img-fluid {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 40px;
      filter: blur(5px);
      z-index: -1;
    }

    .btn:hover {
      transform: scale(115%);
      transition: 1.0s ease-in-out;
    }

    .input {
      border-radius: 20px;

    }
  </style>
</head>

<body>
  <?php include('navbar.php')
      
  
  ?>

  <form action="logica_login.php" method="post">

    <div class="container-fluid p-5 text-center bg-transparent rounded bg">
      <div class=" container blurbox">
      
        <h1>Faça agora seu login</h1>
        <h2>e aproveite o verdadeiro açaí </h2>
        <div class="container-fluid p-3 text-center">
          <p>Login: <input type="text" name="login_cliente" id="login_cliente" class="border-1 input"
              placeholder=" Login" required></p>
          <p>Senha: <input type="password" name="senha" id="senha"
              class="border-1 input" placeholder=" Sua senha" required></p>
          <button type="submit" class="btn btn-primary">Fazer Login</button>
          <div class="container p-4">
            <p>Se preferir faça login com:</p>
            <p><a href="#"><i class="bi bi-google" style="color: white; font-size: 1.5rem;"></i></a> <!--LOGO DA GOOGLE-->
              <a href="#"><i class="bi bi-apple" style="color: white; font-size: 1.5rem;"></i></a> <!--LOGO DA APPLE-->
              <a href="#"><i class="bi bi-instagram" style="color: white; font-size: 1.5rem;"></i></a> <!--LOGO DO INSTAGRAM-->
              </a>
            </p>
          </div>
          <div class="container">
            <p><a href="registrar_conta.php" class="text-decoration-none link" >Não tem conta? Registre-se agora</a></p>
          </div>
        </div>
      </div>
    </div>
  </form>
  <?php
  include('footer.php')
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>