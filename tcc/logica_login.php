<?php
$localhost = "localhost";
$usuario = "root";
$senha = "";
$database = "rochedo";

$conexao = new mysqli(hostname: "$localhost", username: "$usuario", password: "$senha", database: "$database");

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

$usuario = $_POST['login'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM cliente WHERE nome = '$usuario' AND senha= '$senha' ";
$resultado = $conexao->query(query: $sql);

if ($resultado->num_rows > 0) {
    session_start();
    $_SESSION["login"] = $usuario;
    header(header: 'Location: perfil_inicial.php');
    if ($_SESSION["login"] == 'admin') {
        header(header: 'Location: dashboard.php');
    }
}else {
    echo "<p>Nome ou senha incorretos</p>";
    echo "Volte para a página anterior";
} 

$conexao->close();
