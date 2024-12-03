<?php
session_start();
$nome_usuario = $_SESSION['login']; // O login do usuário é armazenado nesta variável de sessão
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rochedo"; // Nome do seu banco de dados

$conn = new mysqli(hostname: $servername, username: $username, password: $password, database: $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Inicializar as variáveis
$nome = $senha = $email = $telefone = $endereco = "";

// Buscar os dados do usuário
$sql = "SELECT * FROM cliente WHERE nome = '$nome_usuario'";
$result = $conn->query(query: $sql);

// Verificar se o usuário existe
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nome = $row['nome'];
    $senha = $row['senha'];
    $email = $row['email'];
    $telefone = $row['telefone'];
    $endereco = $row['endereco'];
} else {
    echo "Usuário não encontrado!";
}




$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--LINK DO BOOTSTRAP 5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--íCONES DO BOOTSTRAP-->
    <link rel="icon" href="\ProjetoTCC\img\berry.png" type="image/x-icon" /> <!--ÍCONE DA PÁGINA-->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!--LINK GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>Editar perfil - Rochedo Açaí</title>
</head>
<style>
    body {
        background: linear-gradient(45deg, #685080, #6545FF, #CC99FF);
        font-family: "Roboto", sans-serif;
        color: white;
    }
</style>

<body>
    <nav class="navbar bg-light navbar-expand-sm py-1">
        <div class="container">
            <a href="index.php" class="navbar-brand d-flex align-items-center">
                <img src="\ProjetoTCC\img\LOGO-Rochedo2.ai.png" alt="Logo Rochedo Açaí" height="20%" width="20%">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="menuNavbar">
                <div class="navbar-nav">
                    <a href="index.php" class="nav-link">Ínicio</a>
                    <a href="logout.php" class="nav-link">Logout</a>
                    <a href="#" class="nav-link carrinho"><i class="bi bi-cart"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="container text-center">
            <h1 class="mt-2">Editar Perfil</h1>
            <form method="POST" action="processa_edicao.php">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="text" name="nome" value="<?php echo $nome; ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $senha; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $telefone; ?>">
                </div>
                <div class="mb-3">
                    <label for="endereco" class="form-label">Endereço:</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $endereco; ?>">
                </div>

                <button type="submit" class="btn btn-primary mb-3">Salvar</button>
            </form>
    </main>
    <?php
    include 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>