<?php
// Conexão com o banco de dados
$host = 'localhost';
$db = 'rochedo';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obtém os parâmetros de pesquisa (nome do produto ou ID)
$searchTerm = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($productId > 0) {
    // Busca por ID
    $sql = "SELECT * FROM produto WHERE idproduto = $productId";
} else {
    // Busca por nome
    $sql = "SELECT * FROM produto WHERE nomeproduto LIKE '%$searchTerm%'";
}

$result = $conn->query($sql);

// Cria um array para armazenar os produtos
$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

// Retorna os produtos em formato JSON
echo json_encode($products);

// Fecha a conexão com o banco de dados
$conn->close();
?>
