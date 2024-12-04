<?php
include("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$login = $_POST['login_cliente'];
$senha = $_POST['senha'];

$sql = "INSERT INTO cliente (nome, email, telefone, endereco, login_cliente, senha) VALUES ('$nome','$email','$telefone','$endereco','$login', '$senha')";
if ($conexao->query(query: $sql) === TRUE) {
    echo "Registrado com sucesso.";
    header(header: "Location: login.php");
} else {
    echo "Erro ao registrar o usuário:" . $conexao->error;
}

$conexao->close();
?>