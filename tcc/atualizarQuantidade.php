<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $quantity = max(1, intval($_POST['quantity'])); // Quantidade mínima de 1

    foreach ($_SESSION['carrinho'] as &$item) {
        if ($item['id'] === $id) {
            $item['quantity'] = $quantity;
            break;
        }
    }

    header('Location: meuCarrinho.php');
    exit;
}
?>
