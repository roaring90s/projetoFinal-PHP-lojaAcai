<?php
// Configuração do banco de dados
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'rochedo';

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Verifica se o ID do produto foi fornecido
if (isset($_GET['id'])) {
    $idproduto = $conexao->real_escape_string($_GET['id']);

    // Busca os dados do produto para exibição no formulário
    $sql = "SELECT * FROM estoque WHERE id = '$idproduto'";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $produto = $result->fetch_assoc();
    } else {
        echo "<div class='alert alert-danger'>Produto não encontrado.</div>";
        exit;
    }
} else {
    echo "<div class='alert alert-danger'>ID do produto não fornecido.</div>";
    exit;
}

if (isset($_POST['editar'])) {
    // Atualiza o produto no banco de dados
    $nome = $conexao->real_escape_string($_POST['nome']);
    $preco = $conexao->real_escape_string($_POST['preco']);
    $quantidade = $conexao->real_escape_string($_POST['quantidade']);

    $sql = "UPDATE estoque SET nome_produto = '$nome', preco = '$preco', quantidade_produto = '$quantidade' WHERE id = '$idproduto'";

    if ($conexao->query($sql) === TRUE) {
        echo "<script> 
				  alert ('Produto editado com sucesso!') 
			  </script>";
		echo "<script> location.href = ('estoque.php') </script>";
       
    } else {
        echo "<script> 
        alert ('<div class='alert alert-danger'>Erro ao editar produto: " . $conexao->error . "</div>') 
    </script>";
echo "<script> location.href = ('editar_produto.php') </script>";
       
    }
}
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
  </style>
</head>
<body>
<?php include 'navbar.php'; ?>
  <div class="container">
    <h1 class="text-center mt-5">Editar Produto</h1>
    <form action="" method="POST">
      <div class="mb-3">
        <label for="nome" class="form-label">Nome do Produto</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $produto['nome_produto']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="preco" class="form-label">Preço do Produto (R$)</label>
        <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="<?php echo $produto['preco']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="quantidade" class="form-label">Quantidade em Estoque</label>
        <input type="number" class="form-control" id="quantidade" name="quantidade" value="<?php echo $produto['quantidade_produto']; ?>" required>
      </div>
     <p> <button type="submit" class="btn btn-primary" name="editar">Salvar Alterações</button></p>
    </form>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>

<?php
$conexao->close();
?>
