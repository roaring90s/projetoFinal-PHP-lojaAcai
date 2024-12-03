<?php
// Conexão com o banco de dados
$host = 'localhost'; // Endereço do banco de dados
$dbname = 'rochedo'; // Nome do banco de dados
$username = 'root'; // Usuário do banco
$password = ''; // Senha do banco

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit;
}

// Verificar se há um termo de pesquisa
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// Modificar a consulta para buscar produtos com base no termo de pesquisa
$sql = "SELECT id, nome_produto, quantidade_produto, preco, dataentrada FROM estoque";
if ($searchTerm) {
    $sql .= " WHERE nome_produto LIKE :searchTerm";
}

$stmt = $pdo->prepare($sql);
if ($searchTerm) {
    $stmt->bindValue(':searchTerm', "%$searchTerm%", PDO::PARAM_STR);
}
$stmt->execute();

// Garantir que a variável $produtos seja sempre um array, mesmo que esteja vazia
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="\ProjetoTCC\img\berry.png" type="image/x-icon" />
  <title>Estoque</title>
  <style>
    body {
      background: linear-gradient(45deg, #685080, #6545FF, #CC99FF);
      font-family: "Roboto", sans-serif;
      color: white;
    }
    .product-table {
      width: 100%;
      margin-top: 20px;
    }
    .product-table th, .product-table td {
      padding: 10px;
      text-align: center;
    }
    .low-stock {
      background-color: #ffcccb;
      color: red;
    }
    .form-container {
      margin-top: 30px;
      padding: 20px;
      background-color: rgba(0, 0, 0, 0.5);
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <?php include 'navbar.php'; ?>

  <div class="container">
    <!-- Formulário de Cadastro de Produto -->
    <div class="form-container">
      <h2 class="text-center">Cadastrar Produto</h2>
      <form action="cadastrar_produto.php" method="POST">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Produto</label>
        <input type="text" class="form-control" id="nome_produto" name="nome_produto" required> <!-- Corrigido -->
    </div>
    <div class="mb-3">
        <label for="quantidade" class="form-label">Quantidade</label>
        <input type="number" class="form-control" id="quantidade_produto" name="quantidade_produto" required> <!-- Corrigido -->
    </div>
    <div class="mb-3">
        <label for="preco" class="form-label">Preço</label>
        <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
    </div>
   
    <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
</form>
    </div>

    <h2 class="text-center mt-5">Produtos Cadastrados</h2>
    <!-- Barra de Pesquisa -->
    <div class="mb-3 mt-5 d-flex justify-content-between">
      <form action="" method="GET" class="d-flex w-75">
        <input type="text" class="form-control" name="search" placeholder="Pesquisar produto..." value="<?= htmlspecialchars($searchTerm) ?>">
        <button type="submit" class="btn btn-primary ms-2">Pesquisar</button>
      </form>
      <form action="" method="GET" class="d-flex w-25">
        <button type="submit" class="btn btn-secondary ms-2" name="search" value="">Limpar</button>
      </form>
    </div>

    <!-- Tabela de Produtos -->
    <table class="table table-striped product-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome do Produto</th>
          <th>Quantidade</th>
          <th>Preço</th>
          <th>Data de Cadastro</th> <!-- Nova coluna para data -->
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($produtos as $produto): ?>
          <tr class="<?= (isset($produto['quantidade_produto']) && $produto['quantidade_produto'] < 10) ? 'low-stock' : ''; ?>">
            <td><?= isset($produto['id']) ? htmlspecialchars($produto['id']) : 'Indefinido'; ?></td>
            <td><?= isset($produto['nome_produto']) ? htmlspecialchars($produto['nome_produto']) : 'Indefinido'; ?></td>
            <td><?= isset($produto['quantidade_produto']) ? htmlspecialchars($produto['quantidade_produto']) : 'Indefinido'; ?></td>
            <td>R$ <?= isset($produto['preco']) ? number_format($produto['preco'], 2, ',', '.') : 'Indefinido'; ?></td>
            <td>
              <?php if (isset($produto['dataentrada'])): ?>
                <?= date("d/m/Y", strtotime($produto['dataentrada'])); ?>
              <?php else: ?>
                Indefinido
              <?php endif; ?>
            </td> <!-- Exibe a data formatada -->
            <td>
              <!-- Botões de Ação -->
              <a href="editar_produto.php?id=<?= $produto['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
              <a href="excluir_produto.php?id=<?= $produto['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <?php include 'footer.php'; ?>

</body>
</html>
