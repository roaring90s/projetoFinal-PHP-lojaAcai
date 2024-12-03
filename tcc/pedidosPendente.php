<?php
session_start();
$_SESSION['login'] = 'admin';
$nome_usuario = $_SESSION['login'];
include('navbar.php');

// Conexão com o banco de dados
include('conexao.php');

// Verificar se o botão "Pago" foi clicado
if (isset($_POST['marcar_pago'])) {
    $pedido_id = $_POST['pedido_id'];

    // Atualizar o status do pedido para "pago"
    $update_sql = "UPDATE pedido SET status = 'pago' WHERE id = ?";
    $stmt = $conexao->prepare($update_sql);
    $stmt->bind_param('i', $pedido_id);

    if ($stmt->execute()) {
        echo "<script>alert('Pedido marcado como pago com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao atualizar o pedido: " . $conexao->error . "');</script>";
    }

    $stmt->close();
}

// Recuperar pedidos pendentes
$sql = "
    SELECT 
        pedido.id, 
        pedido.data_pedido, 
        pedido.status, 
        pedido.forma_pagamento, 
        pedido.valor_total, 
        pedido.horario_pedido, 
        pedido.endereco_cliente, 
        pedido.itens_pedido, 
        cliente.nome AS cliente_nome
    FROM 
        pedido
    JOIN 
        cliente 
    ON 
        pedido.cliente_idcliente = cliente.idcliente
    WHERE 
        pedido.status = 'pendente'";

$result = $conexao->query($sql);

if (!$result) {
    die('Erro na consulta SQL: ' . $conexao->error);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="\giorge\\ProjetoTCC\img\berry.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>Pedidos Pendentes</title>
    <style>
        .link {
            color: aliceblue;
        }
        .bg-cards {
            color: white;
            background-color: rgb(49, 11, 85);
        }
        body {
            background: linear-gradient(45deg, #685080, #6545FF, #CC99FF);
            font-family: "Roboto", sans-serif;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Pedidos Pendentes</h2>
        <div class="table-responsive mt-4">
            <table class="table table-striped table-bordered table-hover text-white bg-cards">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Data do Pedido</th>
                        <th>Forma de Pagamento</th>
                        <th>Valor Total</th>
                        <th>Endereço</th>
                        <th>Itens</th>
                        <th>Horário</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['cliente_nome']; ?></td>
                                <td><?php echo date('d/m/Y', strtotime($row['data_pedido'])); ?></td>
                                <td><?php echo $row['forma_pagamento']; ?></td>
                                <td><?php echo 'R$ ' . number_format($row['valor_total'], 2, ',', '.'); ?></td>
                                <td><?php echo $row['endereco_cliente']; ?></td>
                                <td><?php echo $row['itens_pedido']; ?></td>
                                <td><?php echo date('H:i', strtotime($row['horario_pedido'])); ?></td>
                                <td><?php echo ucfirst($row['status']); ?></td>
                                <td>
                                    <!-- Botão para marcar como pago -->
                                    <form method="POST" style="display: inline;">
                                        <input type="hidden" name="pedido_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="marcar_pago" class="btn btn-success btn-sm">Pago</button>
                                    </form>
                                    <a href="detalhes_pedido.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Ver Detalhes</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="10" class="text-center">Nenhum pedido pendente encontrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$conexao->close();
?>
