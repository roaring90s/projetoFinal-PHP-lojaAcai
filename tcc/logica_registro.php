<?php
$localhost = "localhost";
$usuario = "root";
$senha = "";
$database = "rochedo";

$conexao = new mysqli(hostname: "$localhost", username: "$usuario", password: "$senha", database: "$database");

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

$login = $_POST['login'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];

$sql = "INSERT INTO cliente (nome, senha, email, telefone, endereco) VALUES ('$login', '$senha', '$email', '$telefone', '$endereco')";
if ($conexao->query(query: $sql) === TRUE) {
    echo "Registrado com sucesso.";
    header(header: "Location: login.php");
} else {
    echo "Erro ao registrar o usuário:" . $conexao->error;
}

$conexao->close();
