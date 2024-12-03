<?php
session_start();

// Inicializa o carrinho na sessão, se ainda não existir
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Adicionar produto ao carrinho
if (isset($_GET['id'], $_GET['nome'], $_GET['preco'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);
    $preco = filter_input(INPUT_GET, 'preco', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    
    if ($id && $nome && $preco) {
        $_SESSION['carrinho'][] = ['id' => $id, 'nome' => $nome, 'preco' => $preco, 'quantidade' => 1];
    }
    header('Location: carrinho.php');
    exit();
}

// Remover produto do carrinho
if (isset($_GET['remover'])) {
    $index = filter_input(INPUT_GET, 'remover', FILTER_SANITIZE_NUMBER_INT);
    if (isset($_SESSION['carrinho'][$index])) {
        unset($_SESSION['carrinho'][$index]);
        $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
    }
    header('Location: meuCarrinho.php');
    exit();
}

// Atualizar a quantidade do produto
if (isset($_POST['atualizar_quantidade'], $_POST['quantidade'])) {
    $index = filter_input(INPUT_POST, 'atualizar_quantidade', FILTER_SANITIZE_NUMBER_INT);
    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);

    if (isset($_SESSION['carrinho'][$index]) && $quantidade > 0) {
        $_SESSION['carrinho'][$index]['quantidade'] = $quantidade; // Atualiza a quantidade
    }
    header('Location: meuCarrinho.php');
    exit();
}

// Redireciona caso não haja ação válida
header('Location: carrinho.php');
exit();
