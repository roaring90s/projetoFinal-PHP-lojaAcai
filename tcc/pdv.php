<?php
// Conexão com o banco de dados
$host = 'localhost'; // Host do banco
$dbname = 'rochedo'; // Nome do banco
$username = 'root'; // Usuário do banco
$password = ''; // Senha do banco

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
    exit;
}

// Inicializa as variáveis de pesquisa
$pesquisa = '';
$pesquisa_id = '';
$query = "SELECT * FROM estoque"; // Query padrão sem filtro de pesquisa

// Verifica se foi feita uma pesquisa
if (isset($_GET['pesquisar']) && !empty($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
    $query = "SELECT * FROM produto WHERE nomeproduto LIKE :pesquisa";
} elseif (isset($_GET['pesquisar_id']) && !empty($_GET['pesquisa_id'])) {
    $pesquisa_id = $_GET['pesquisa_id'];
    $query = "SELECT * FROM produto WHERE idproduto = :pesquisa_id";
}

$stmt = $pdo->prepare($query);

// Aplica o filtro de pesquisa adequado
if (!empty($pesquisa)) {
    $stmt->bindValue(':pesquisa', '%' . $pesquisa . '%');
} elseif (!empty($pesquisa_id)) {
    $stmt->bindValue(':pesquisa_id', $pesquisa_id);
}

$stmt->execute();
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Inicializa o carrinho de compras
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Função para adicionar produtos ao carrinho
if (isset($_GET['adicionar'])) {
    $idProduto = $_GET['adicionar'];
    if (!isset($_SESSION['carrinho'][$idProduto])) {
        $_SESSION['carrinho'][$idProduto] = 1;
    } else {
        $_SESSION['carrinho'][$idProduto]++;
    }
    header('Location: pdv.php');
    exit;
}

// Função para remover produtos do carrinho
if (isset($_GET['remover'])) {
    $idProduto = $_GET['remover'];
    if (isset($_SESSION['carrinho'][$idProduto])) {
        unset($_SESSION['carrinho'][$idProduto]);
    }
    header('Location: pdv.php');
    exit;
}

// Função para limpar o carrinho
if (isset($_GET['limpar'])) {
    unset($_SESSION['carrinho']);
    header('Location: pdv.php');
    exit;
}

// Função para calcular o total
$total = 0;
foreach ($_SESSION['carrinho'] as $id => $quantidade) {
    foreach ($produtos as $produto) {
        if ($produto['id'] == $id) {
            $total += $produto['preco'] * $quantidade;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDV - Sistema de Vendas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(45deg, #685080, #6545FF, #CC99FF);
            font-family: 'Roboto', sans-serif;
            color: white;
        }
        .table th, .table td {
            color: black;
        }
        .cart-summary {
            margin-top: 30px;
            padding: 15px;
            background-color: #fff;
            color: #333;
            border-radius: 5px;
        }
        .cancel-item {
            margin-left: 10px;
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>   

<div class="container">
    <h1 class="text-center mt-5">PDV - Sistema de Vendas</h1>

    <!-- Barra de Pesquisa -->
    <div class="row mb-4">
        <div class="col-md-8 offset-md-2">
            <!-- Formulário de pesquisa por nome -->
            <form action="pdv.php" method="GET" class="d-flex">
                <input type="text" name="pesquisa" class="form-control" placeholder="Pesquisar produtos por nome" value="<?= htmlspecialchars($pesquisa); ?>">
                <button type="submit" name="pesquisar" class="btn btn-primary ms-2">Pesquisar</button>
                <!-- Botão Limpar ao lado do botão Pesquisar -->
                <a href="pdv.php" class="btn btn-secondary ms-2">Limpar</a>
            </form>
            
            <!-- Formulário de pesquisa por ID -->
            <form action="pdv.php" method="GET" class="d-flex mt-3">
                <input type="text" name="pesquisa_id" class="form-control" placeholder="Pesquisar por ID" value="<?= htmlspecialchars($pesquisa_id); ?>">
                <button type="submit" name="pesquisar_id" class="btn btn-primary ms-2">Pesquisar</button>
            </form>
        </div>
    </div>

    <!-- Tabela de Produtos -->
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Produto</th>
                        <th>Estoque</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td><?= $produto['id']; ?></td>
                            <td><?= $produto['nome_produto']; ?></td>
                            <td><?= $produto['quantidade_produto']; ?></td>
                            <td>R$ <?= number_format($produto['preco'], 2, ',', '.'); ?></td>
                            <td>
                                <a href="pdv.php?adicionar=<?= $produto['id']; ?>" class="btn btn-success btn-sm">Adicionar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Carrinho de Compras -->
    <div class="cart-summary">
        <h3>Carrinho de Compras</h3>
        <?php if (count($_SESSION['carrinho']) > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['carrinho'] as $id => $quantidade): ?>
                        <?php
                            $produto = null;
                            foreach ($produtos as $p) {
                                if ($p['id'] == $id) {
                                    $produto = $p;
                                    break;
                                }
                            }

                            // Verifica se o produto foi encontrado
                            if ($produto === null) {
                                continue; // Se não encontrar o produto, pula para o próximo
                            }
                        ?>
                        <tr>
                            <td><?= $produto['nome_produto']; ?></td>
                            <td><?= $quantidade; ?></td>
                            <td>R$ <?= number_format($produto['preco'] * $quantidade, 2, ',', '.'); ?></td>
                            <td>
                                <a href="pdv.php?remover=<?= $id; ?>" class="btn btn-danger btn-sm cancel-item">Remover</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="2" style="font-size: 50px; font-weight: bold;">Total</td>
                        <td colspan="2" style="color: red; font-size: 50px;">R$ <?= number_format($total, 2, ',', '.'); ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="finalizar_venda.php" class="btn btn-primary w-100">Finalizar Compra</a>
            <!-- Botão para limpar o carrinho -->
            <a href="pdv.php?limpar=true" class="btn btn-danger w-100 mt-2">Limpar Carrinho</a>
        <?php else: ?>
            <p>Seu carrinho está vazio. Adicione produtos para continuar.</p>
        <?php endif; ?>
    </div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
