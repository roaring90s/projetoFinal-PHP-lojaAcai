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
      background-color: rgba(255, 255, 255, 0.2);
      /* Branco com 20% de opacidade */
      backdrop-filter: blur(10px);
      /* Efeito de blur*/
      padding: 15px;
      /* Espaçamento interno */
      border-radius: 40px;
      /* Borda arredondada */
      box-shadow: inset 0px 2px 4px rgba(0, 0, 0, 0.2);
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
  <?php include('navbar.php') ?>

  <form action="logica_registro.php" method="post">

    <div class="container-fluid p-5 text-center bg-transparent rounded bg">
      <div class=" container blurbox">
        <h1>Registre sua conta</h1>
        <h2>e aproveite o verdadeiro açaí </h2>
        <div class="container-fluid p-3 text-center">
        <p>Nome: <input type="text" name="nome" id="nome" class="border-1 input"
        placeholder="Nome" required></p>
          <p>Login: <input type="text" name="login_cliente" id="login_cliente" class="border-1 input"
              placeholder="Login" required></p>
          <p>Senha: <input type="password" name="senha" id="senha"
              class="border-1 input" placeholder="Sua senha" required></p>
          <p>Email: <input type="text" name="email" id="email"
              class="border-1 input" placeholder="Email" required></p>
          <p>Telefone: <input type="text" name="telefone" id="telefone" class="border-1 input"
              placeholder="Telefone" required></p>
          <p>Endereço: <input type="text" name="endereco" id="endereco"
              class="border-1 input" placeholder="Endereco" required></p>
          <button type="submit" class="btn btn-primary">Registrar Conta</button>

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