<?php
// Conexão com o banco de dados (substitua pelos seus dados)
$localhost = "localhost";
$usuario = "root";
$senha = "";
$database = "rochedo";

$conexao = new mysqli(hostname: "$localhost", username: "$usuario", password: "$senha", database: "$database");

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Recebe o ID do funcionário enviado pelo formulário
$id_funcionario = $_POST['id'];

// Prepara e executa a query de exclusão
$sql = "DELETE FROM funcionario WHERE idfuncionario = '$id_funcionario'";
if ($conexao->query(query: $sql) === TRUE) {
    echo "Funcionário excluído com sucesso!";
    header("Location: exc_func.php");
} else {
    echo "Erro ao excluir funcionário: " . $conn->error;
}


$conexao->close();