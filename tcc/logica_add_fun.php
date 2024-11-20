<?php
$localhost = "localhost";
$usuario = "root";
$senha = "";
$database = "rochedo";

$conexao = new mysqli(hostname: "$localhost", username: "$usuario", password: "$senha", database: "$database");

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$cargo = $_POST['cargo'];
$salario = $_POST['salario'];
$sexo = $_POST['sexo'];
$telefone = $_POST['telefone'];
$status = $_POST['status'];

$sql = "INSERT INTO funcionario (nome, cpf, endereco, cargo , salario, sexo, telefone, status ) VALUES ('$nome', '$cpf', '$endereco', '$cargo', '$salario', '$sexo', '$telefone', '$status')";
if ($conexao->query(query: $sql) === TRUE) {
    echo "Registrado com sucesso.";
    header(header: "Location: listar_func.php");
} else {
    echo "Erro ao registrar o usuário:" . $conexao->error;
}

$conexao->close();
