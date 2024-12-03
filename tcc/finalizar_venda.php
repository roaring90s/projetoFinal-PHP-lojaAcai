<?php
// Conexão com o banco de dados
$host = 'localhost';
$dbname = 'rochedo';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
    exit;
}

// Inicializa a sessão
if (!isset($_SESSION)) {
    session_start();
}

// Verifica se o carrinho está vazio
if (!isset($_SESSION['carrinho']) || count($_SESSION['carrinho']) === 0) {
    echo "O carrinho está vazio. Adicione produtos antes de finalizar a compra.";
    exit;
}

// Verifica se o funcionário está logado
if (!isset($_SESSION['idfuncionario'])) {
    echo "Funcionário não identificado. Faça login novamente.";
    exit;
}

$idFuncionario = $_SESSION['idfuncionario'];

try {
    $pdo->beginTransaction(); // Inicia uma transação

    // Calcula o total da venda
    $totalVenda = 0;
    foreach ($_SESSION['carrinho'] as $idProduto => $quantidade) {
        $stmtProduto = $pdo->prepare("SELECT * FROM produto WHERE idproduto = :idproduto");
        $stmtProduto->bindValue(':idproduto', $idProduto);
        $stmtProduto->execute();
        $produto = $stmtProduto->fetch(PDO::FETCH_ASSOC);

        if (!$produto) {
            throw new Exception("Produto com ID $idProduto não encontrado.");
        }

        $totalVenda += $produto['preco'] * $quantidade;
    }

    // Insere os dados da venda principal
    $stmtVenda = $pdo->prepare("
        INSERT INTO venda (data_venda, total, funcionario_idfuncionario) 
        VALUES (NOW(), :total, :idfuncionario)
    ");
    $stmtVenda->execute([
        ':total' => $totalVenda,
        ':idfuncionario' => $idFuncionario
    ]);
    $idVenda = $pdo->lastInsertId(); // Obtém o ID da venda

    // Prepara a inserção dos itens da venda
    $stmtItens = $pdo->prepare("
        INSERT INTO venda_itens (idvenda, nome_produto, preco, quantidade, total) 
        VALUES (:idvenda, :nome_produto, :preco, :quantidade, :total)
    ");

    foreach ($_SESSION['carrinho'] as $idProduto => $quantidade) {
        // Obtém os detalhes do produto
        $stmtProduto = $pdo->prepare("SELECT * FROM produto WHERE idproduto = :idproduto");
        $stmtProduto->bindValue(':idproduto', $idProduto);
        $stmtProduto->execute();
        $produto = $stmtProduto->fetch(PDO::FETCH_ASSOC);

        if (!$produto) {
            throw new Exception("Produto com ID $idProduto não encontrado.");
        }

        // Calcula o total para este item
        $totalItem = $produto['preco'] * $quantidade;

        // Insere o item da venda
        $stmtItens->execute([
            ':idvenda' => $idVenda,
            ':nome_produto' => $produto['nomeproduto'],
            ':preco' => $produto['preco'],
            ':quantidade' => $quantidade,
            ':total' => $totalItem
        ]);

        // Atualiza o estoque do produto
        $novoEstoque = $produto['qtdprodutos'] - $quantidade;
        if ($novoEstoque < 0) {
            throw new Exception("Estoque insuficiente para o produto: " . $produto['nomeproduto']);
        }

        $stmtAtualizaEstoque = $pdo->prepare("UPDATE produto SET qtdprodutos = :novoEstoque WHERE idproduto = :idproduto");
        $stmtAtualizaEstoque->execute([
            ':novoEstoque' => $novoEstoque,
            ':idproduto' => $idProduto
        ]);
    }

    $pdo->commit(); // Confirma a transação

    // Limpa o carrinho após finalizar a venda
    unset($_SESSION['carrinho']);

    echo "Venda finalizada com sucesso!";
    echo "<a href='pdv.php'>Voltar ao PDV</a>";

} catch (Exception $e) {
    $pdo->rollBack(); // Reverte a transação em caso de erro
    echo "Erro ao finalizar a venda: " . $e->getMessage();
}
?>
