<?php
session_start();

// Verifica se o carrinho já existe, caso contrário, cria um array vazio
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Dados do produto enviado via POST
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

// Verifica se o produto já está no carrinho
$exists = false;
foreach ($_SESSION['carrinho'] as &$item) {
    if ($item['id'] == $id) {
        $item['quantity'] += $quantity; // Atualiza a quantidade
        $exists = true;
        break;
    }
}

// Se o produto não existir, adiciona ao carrinho
if (!$exists) {
    $_SESSION['carrinho'][] = [
        'id' => $id,
        'name' => $name,
        'price' => $price,
        'quantity' => $quantity
    ];
}

// Redireciona de volta para a página carrinho.php
header('Location: carrinho.php');
exit;
?>
