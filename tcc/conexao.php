<?php


$localhost = "localhost";
$usuario = "root";
$senha = "";
$database = "rochedo";

$conexao = new mysqli(hostname: "$localhost", username: "$usuario", password: "$senha", database: "$database");

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}