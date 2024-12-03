<?php
session_start();

if (isset($_GET['id']) && isset($_SESSION['carrinho'])) {
    $id = $_GET['id'];
    foreach ($_SESSION['carrinho'] as $key => $item) {
        if ($item['id'] == $id) {
            unset($_SESSION['carrinho'][$key]); // Remove o item
            break;
        }
    }
    // Reorganiza os índices do array
    $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
}

// Redireciona de volta para meuCarrinho.php
header('Location: meuCarrinho.php');
exit;
?>
