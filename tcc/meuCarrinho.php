<?php
session_start();
include('protected.php');
include("navbar.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Meu Carrinho</title>
</head>
<style>
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
<body>
<div class="container mt-5">
    <h1 class="text-center">Carrinho de Compras</h1>
    <div class="blur p-4 rounded">
        <table class="table table-hover table-dark text-white">
            <thead>
            <tr>
                <th>Produto</th>
                <th>Acompanhamentos</th>
                <th>Preço Unitário</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
                $total = 0;
                foreach ($_SESSION['carrinho'] as $item) {
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                    $acompanhamentos = implode(', ', $item['acompanhamentos']);
                    echo "
                    <tr>
                        <td>{$item['name']}</td>
                        <td>{$acompanhamentos}</td>
                        <td>R$ " . number_format($item['price'], 2, ',', '.') . "</td>
                        <td>{$item['quantity']}</td>
                        <td>R$ " . number_format($subtotal, 2, ',', '.') . "</td>
                        <td>
                            <a href='removerItem.php?id={$item['id']}' class='btn btn-danger btn-sm'>
                                <i class='bi bi-trash'></i>
                            </a>
                        </td>
                    </tr>";
                }
                echo "
                <tr>
                    <td colspan='4'><strong>Total</strong></td>
                    <td><strong>R$ " . number_format($total, 2, ',', '.') . "</strong></td>
                    <td></td>
                </tr>";
            } else {
                echo "<tr><td colspan='6' class='text-center'>Seu carrinho está vazio!</td></tr>";
            }
            ?>
            </tbody>
        </table>
        <?php if (!empty($_SESSION['carrinho'])): ?>
            <form action="dadosEntrega.php" method="POST">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Prosseguir para Dados de Entrega</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
<?php include('footer.php'); ?>
</body>
</html>
