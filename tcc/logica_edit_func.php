<?php
include 'conexao.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id =$_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $cargo = $_POST['cargo'];
    $salario = $_POST['salario'];
    $sexo = $_POST['sexo'];
    $telefone = $_POST['telefone'];

    $sql = "UPDATE funcionario SET nome='$nome', cpf='$cpf', endereco ='$endereco', cargo ='$cargo', salario ='$salario', sexo = '$sexo', telefone='$telefone' WHERE idfuncionario='$id' ";

    if ($conexao->query(query: $sql) === TRUE) {
            header(header: "Location: listar_func.php");
    }else {
         echo "Erro" . $conexao->error;
    }
}
