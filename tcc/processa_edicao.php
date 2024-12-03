<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $sql = "UPDATE cliente SET nome='$nome', senha='$senha', email ='$email', telefone ='$telefone', endereco ='$endereco' WHERE idcliente='$id' ";

    if ($conexao->query(query: $sql) === TRUE) {

        
        header(header: "Location: perfil_inicial.php");
    } else {
        echo "Erro ao atualizar seus dados." . $conexao->error;
    }
}
