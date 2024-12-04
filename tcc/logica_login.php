<?php
include("conexao.php");

if (isset($_POST['login_cliente']) || isset($_POST['senha'])) {

    if (strlen($_POST['login_cliente']) == 0) {
        echo "<script>alert('Preencha seu login.')</script>";
        echo "<script>location.href='login.php'</script>";
    } else if (strlen($_POST['senha']) == 0) {
        echo "<script>alert('Preencha sua senha.')</script>";
        echo "<script>location.href='login.php'</script>";
    } else {

        $login = $conexao->real_escape_string($_POST['login_cliente']);
        $senha = $conexao->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM cliente WHERE login_cliente = '$login' AND senha = '$senha'";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['idcliente'];
            $_SESSION['name'] = $usuario['login_cliente'];

            // Verifica se o login é admin
            if ($usuario['login_cliente'] === 'admin') {
                header("Location: dashboard.php");
            } else {
                header("Location: perfil_inicial.php");
            }
            exit; // Encerra o script após o redirecionamento

        } else {
            echo "<script>alert('Login ou Senha Incorretos.')</script>";
            echo "<script>window.location.href = 'login.php';</script>";
        }
    }
}
?>
