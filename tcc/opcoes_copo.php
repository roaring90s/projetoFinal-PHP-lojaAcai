<?php

include('conexao.php');  // Certifique-se de que está com a conexão certa (use $conexao aqui)


if (isset($_POST['adicionar_carrinho'])) {
  $idproduto = $_POST['idproduto'];
  $quantidade = $_POST['quantidade'];
  $preco_unitario = $_POST['preco_unitario'];
  $preco_total = $quantidade * $preco_unitario;

  $query = "INSERT INTO carrinho (idcliente, idproduto, quantidade, preco_unitario, preco_total)
            VALUES (?, ?, ?, ?, ?)";
  $stmt = $conexao->prepare($query);
  $stmt->bind_param("iiidd", $idcliente, $idproduto, $quantidade, $preco_unitario, $preco_total);

  if ($stmt->execute()) {
      echo "<script>alert('Produto adicionado ao carrinho.');</script>";
  } else {
      echo "<script>alert('Erro ao adicionar produto ao carrinho.');</script>";
  }
  $stmt->close();
}



// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Captura os dados do formulário
    $idcliente = $_POST['idcliente'];
    $idproduto = $_POST['idproduto'];
    $quantidade = $_POST['quantidade'];
    $preco_unitario = $_POST['preco_unitario'];
    $preco_total = $quantidade * $preco_unitario;

    // Preparar a consulta SQL para inserção no banco
    $query = "INSERT INTO carrinho (idcliente, idproduto, quantidade, preco_unitario, preco_total) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($query);
    
    if ($stmt === false) {
        die('Erro ao preparar a consulta: ' . $conexao->error);
    }

    // Binding de parâmetros
    $stmt->bind_param("iiidd", $idcliente, $idproduto, $quantidade, $preco_unitario, $preco_total);

    // Executa a consulta e exibe mensagem dependendo do sucesso ou falha
    if ($stmt->execute()) {
        echo "<script>alert('Produto adicionado ao carrinho com sucesso!'); window.location.href = 'carrinho_final.php';</script>";
    } else {
        echo "<script>alert('Erro ao adicionar produto ao carrinho. " . $stmt->error . "');</script>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="icon" href="\ProjetoTCC\img\berry.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
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

    .card-body {
      background-color: rgba(255, 255, 255, 0.2);
    }
  </style>
</head>

<body>
  <?php include 'navbar.php'; ?>

  <main>
    <div class="container py-5">
      <h1 class="text-center">Açaís Premium</h1>
      <h2 class="text-center"><span class="badge bg-danger">+2 Acompanhamentos</span></h2>
    </div>

    <div class="container py-5">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-1">
        <!-- Produto 1 -->
        <div class="col">
          <div class="card blur">
            <img src="\ProjetoTCC\img\copo200.png" alt="Copo de 200ml" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title text-center">Copo de 200ML</h5>
              <p class="card-text text-center"><span class="badge bg-danger">R$ 7,50</span></p>

              <form method="POST" action="carrinho_final.php">
                <input type="hidden" name="idcliente" value="1"> <!-- ID do cliente -->
                <input type="hidden" name="idproduto" value="1"> <!-- ID do produto -->
                <input type="hidden" name="quantidade" value="1"> <!-- Quantidade -->
                <input type="hidden" name="preco_unitario" value="7.50"> <!-- Preço unitário -->
                <button type="submit" class="btn btn-success">
                  <i class="bi bi-cart-plus"></i> Adicionar ao carrinho
                </button>
              </form>
            </div>
          </div>
        </div>

        <!-- Adicione outros produtos aqui seguindo a mesma estrutura -->
        <!-- Produto 2, Produto 3, etc. -->

      </div>
    </div>
  </main>

  <?php include('footer.php'); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
