<?php
include 'conexao.php';
session_start();
$_SESSION['login'] = 'admin';
$nome_usuario = $_SESSION['login'];
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
    <!--ÍCONES DO BOOTSTRAP-->
    <link rel="icon" href="\ProjetoTCC\img\berry.png" type="image/x-icon" /> <!--ÍCONE DA PÁGINA-->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!--LINK GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            /* CONFIGURAÇÃO DO CORPO DA PÁGINA */
            background: linear-gradient(45deg, #685080, #6545FF, #CC99FF);
            font-family: "Roboto", sans-serif;
            color: white;
            scroll-behavior: smooth;

        }

        .cor {
            color: black;
        }
    </style>
    <title>Editar Funcionário</title>
</head>

<body>
    <nav class="navbar bg-light navbar-expand-sm py-1 ">
        <div class="container">
            <a href="index.php" class="navbar-brand d-flex align-items-center">
                <img src="\ProjetoTCC\img\LOGO-Rochedo2.ai.png" alt="Logo Rochedo Açaí" height="20%" width="20%">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="menuNavbar">
                <div class="navbar-nav">
                    <a href="index.php" class="nav-link">Ínicio</a>
                    <a href="pedido.php" class="nav-link">Cardápio</a>
                    <a href="logout.php" class="nav-link">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <main>

        <div class="container">
            <table class="table table-dark table-striped mt-3">
                <thead>
                    <tr>
                        <th>ID</th>

                        <th>Nome</th>
                        <th>Cargo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Código PHP para buscar os dados do banco de dados e montar a tabela
                    include 'conexao.php';
                    $sql = "SELECT * FROM funcionario";
                    $resultado = $conexao->query(query: $sql);

                    if ($resultado->num_rows > 0) {
                        while ($row = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["idfuncionario"] . "</td>";
                            echo "<td>" . $row["nome"] . "</td>";
                            echo "<td>" . $row["cargo"] . "</td>";
                            echo "<td>";
                            echo "<button type='button' class='btn btn-primary btn-edit' data-bs-toggle='modal' data-bs-target='#editModal' data-id='" . $row['idfuncionario'] . "'>Editar</button>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan ='4'>Nenhum funcionário encontrado.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title cor" id="editModalLabel">Editar
                                Funcionário</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="logica_edit_func.php" method="post">
                                <label for="nome" class="cor">Confirme o ID para editar:</label>
                                <input type="text" name="id" id="id" class="form-control">
                                <label for="nome" class="cor">Nome:</label>
                                <input type="text" name="nome" id="nome" class="form-control">
                                <label for="cargo" class="cor">CPF:</label>
                                <input type="text" name="cpf" id="cpf" class="form-control">
                                <label for="cargo" class="cor">Endereço:</label>
                                <input type="text" name="endereco" id="endereco" class="form-control">
                                <label for="cargo" class="cor">Cargo:</label>
                                <input type="text" name="cargo" id="cargo" class="form-control">
                                <label for="cargo" class="cor">Salário:</label>
                                <input type="text" name="salario" id="salario" class="form-control">
                                <label for="cargo" class="cor">Sexo:</label>
                                <input type="text" name="sexo" id="salario" class="form-control">
                                <label for="cargo" class="cor">Telefone:</label>
                                <input type="text" name="telefone" id="salario" class="form-control">
                                <button type="submit" class="btn btn-primary mt-2">Editar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>  

        <script>
            // JavaScript para abrir o modal e preencher o formulário
            $(document).ready(function() {
                $('.btn-edit').click(function() {
                    var id = $(this).data('id');
                    $.ajax({
                        url: 'editar_funcionario.php',
                        data: {
                            id: id
                        },
                        success: function(data) {
                            $('#editModal .modal-body').html(data);
                        }
                    });
                });
            });
        </script>
    </main>
    <?php
    include 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!--SCRIPT PARA ALGUMAS INTERATIVIDADES DO BOOTSTRAP 5-->
</body>

</html>