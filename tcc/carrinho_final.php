<?php
include('conexao.php');

// Verifica se o idcliente existe na sessão
if (!isset($_SESSION['idcliente'])) {
  // Se não estiver logado, redireciona para a página de login
  header('Location: login.php');
  exit();  // Evita a execução do restante do código
}

$idcliente = $_SESSION['idcliente'];  // Agora o idcliente está garantido na sessão



if (isset($_GET['remover'])) {
  $idproduto_remover = $_GET['remover'];

  $query = "DELETE FROM carrinho WHERE idproduto = ? AND idcliente = ?";
  $stmt = $conexao->prepare($query);
  $stmt->bind_param("ii", $idproduto_remover, $idcliente);
  if ($stmt->execute()) {
    echo "<script>alert('Produto removido do carrinho.'); window.location.href = 'carrinho_final.php';</script>";
  } else {
    echo "<script>alert('Erro ao remover o produto.');</script>";
  }
  $stmt->close();
}

$query = "SELECT p.nomeproduto, c.idproduto, c.quantidade, c.preco_unitario, c.preco_total
          FROM carrinho c
          JOIN produto p ON c.idproduto = p.idproduto
          WHERE c.idcliente = ?";
$stmt = $conexao->prepare($query);
$stmt->bind_param("i", $idcliente);
$stmt->execute();
$result = $stmt->get_result();
$total_carrinho = 0;

if ($result->num_rows > 0) {
  echo "Itens encontrados no carrinho.";
} else {
  echo "Nenhum item encontrado no carrinho.";
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

    .table td,
    .table th {
      vertical-align: middle;
    }

    .total {
      font-size: 1.5rem;
      font-weight: bold;
      color: #ff6666;
    }
  </style>
</head>

<body>
  <?php include 'navbar.php'; ?>

  <main>
    <div class="container py-5">
      <h1 class="text-center">Carrinho de Compras</h1>

      <?php
      if ($result->num_rows > 0) {
        // Iniciar a tabela
        echo '<table class="table table-light table-striped text-dark">';
        echo '<thead><tr><th>Produto</th><th>Quantidade</th><th>Preço Unitário</th><th>Total</th><th>Ações</th></tr></thead>';
        echo '<tbody>';

        // Iterar sobre os itens no carrinho
        while ($row = $result->fetch_assoc()) {
          $total_carrinho += $row['preco_total'];

          echo "<tr>
                      <td>{$row['nomeproduto']}</td>
                      <td>{$row['quantidade']}</td>
                      <td>R$ " . number_format($row['preco_unitario'], 2, ',', '.') . "</td>
                      <td>R$ " . number_format($row['preco_total'], 2, ',', '.') . "</td>
                      <td>
                          <a href='carrinho_final.php?remover={$row['idproduto']}' class='btn btn-danger'>
                              <i class='bi bi-trash'></i> Remover
                          </a>
                      </td>
                  </tr>";
        }
        echo '</tbody>';
        echo '</table>';

        // Exibir total do carrinho
        echo "<div class='text-center total'>Total do Carrinho: R$ " . number_format($total_carrinho, 2, ',', '.') . "</div>";

        // Adicionar botão para prosseguir para o checkout
        echo "<div class='text-center mt-4'>
                  <a href='checkout.php' class='btn btn-primary'>
                      <i class='bi bi-credit-card'></i> Finalizar Compra
                  </a>
              </div>";
      } else {
        echo "<p class='text-center'>Seu carrinho está vazio.</p>";
      }

      $stmt->close();
      ?>
    </div>
  </main>

  <?php include('footer.php'); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>