<?php 
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rochedo"; // Nome do seu banco de dados

$conexao = new mysqli(hostname: $servername, username: $username, password: $password, database: $dbname);

// Verificar conexão
if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
}
?>