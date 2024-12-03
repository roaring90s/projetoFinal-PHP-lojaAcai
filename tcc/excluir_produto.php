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

// Verificar se o 'id' do produto foi passado pela URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idproduto = $_GET['id'];

    // Verificar se o produto existe no banco de dados
    $sql = "SELECT * FROM estoque WHERE id = :idproduto";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':idproduto', $idproduto, PDO::PARAM_INT);
    $stmt->execute();
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    // Se o produto não existir, redireciona para a página de produtos com mensagem de erro
    if (!$produto) {
        echo "Produto não encontrado!";
        exit;
    }

    // Excluir o produto do banco de dados
    $sql = "DELETE FROM estoque WHERE id = :idproduto";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':idproduto', $idproduto, PDO::PARAM_INT);
    $stmt->execute();

    // Redirecionar para a página de estoque após a exclusão
    header("Location: estoque.php");
    exit;
} else {
    echo "ID do produto não especificado!";
    exit;
}
?>
