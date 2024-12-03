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

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter os dados do formulário
    $nomeProduto = isset($_POST['nome_produto']) ? trim($_POST['nome_produto']) : '';
    $quantidadeProduto = isset($_POST['quantidade_produto']) ? intval($_POST['quantidade_produto']) : 0;
    $preco = isset($_POST['preco']) ? floatval($_POST['preco']) : 0.0;

    // Validar os campos obrigatórios
    if (!empty($nomeProduto) && $quantidadeProduto > 0 && $preco > 0) {
        try {
            // Inserir os dados no banco de dados
            $sql = "INSERT INTO estoque (nome_produto, quantidade_produto, preco) 
                    VALUES (:nome_produto, :quantidade_produto, :preco)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome_produto', $nomeProduto, PDO::PARAM_STR);
            $stmt->bindParam(':quantidade_produto', $quantidadeProduto, PDO::PARAM_INT);
            $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
            $stmt->execute();

            // Redirecionar com mensagem de sucesso
            header("Location: estoque.php?success=1");
            exit;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar produto: " . $e->getMessage();
            exit;
        }
    } else {
        // Redirecionar com mensagem de erro
        header("Location: estoque.php?error=1");
        exit;
    }
} else {
    // Redirecionar para a página principal se o acesso não for via POST
    header("Location: estoque.php");
    exit;
}
