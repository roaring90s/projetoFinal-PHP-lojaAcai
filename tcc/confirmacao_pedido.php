<?php
session_start();
$_SESSION['login'] = 'admin';
$nome_usuario = $_SESSION['login'];
include('navbar.php');

// Conexão com o banco de dados
include('conexao.php');

// Verificar se o ID do pedido foi passado na URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $pedido_id = $_GET['id'];

    // Recuperar os detalhes do pedido com base no ID
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
            pedido.id = ?";
    
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('i', $pedido_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar se o pedido foi encontrado
    if ($result->num_rows > 0) {
        $pedido = $result->fetch_assoc();

        // Decodificar os itens do pedido
        $itens_pedido = json_decode($pedido['itens_pedido'], true); // Assumindo que é JSON
    } else {
        echo "<script>alert('Pedido não encontrado.'); window.location.href='pedidos_pendentes.php';</script>";
        exit();
    }

    $stmt->close();
} else {
    echo "<script>alert('ID inválido.'); window.location.href='pedidos_pendentes.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap.min.css">
    <link rel="icon" href="\giorge\\ProjetoTCC\img\berry.png" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Detalhes do Pedido</title>
    <style>
        .bg-cards {
            color: white;
            background-color: rgb(49, 11, 85);
        }

        body {
            background: linear-gradient(45deg, #685080, #6545FF, #CC99FF);
            font-family: "Roboto", sans-serif;
            color: white;
        }

        .link {
            color: aliceblue;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Detalhes do Pedido</h2>
        <div class="mt-4">
            <div class="card bg-cards">
                <div class="card-header">
                    <h5>Informações do Pedido #<?php echo $pedido['id']; ?></h5>
                </div>
                <div class="card-body">
                    <p><strong>Cliente:</strong> <?php echo $pedido['cliente_nome']; ?></p>
                    <p><strong>Data do Pedido:</strong> <?php echo date('d/m/Y', strtotime($pedido['data_pedido'])); ?></p>
                    <p><strong>Forma de Pagamento:</strong> <?php echo $pedido['forma_pagamento']; ?></p>
                    <p><strong>Valor Total:</strong> R$ <?php echo number_format($pedido['valor_total'], 2, ',', '.'); ?></p>
                    <p><strong>Endereço de Entrega:</strong> <?php echo $pedido['endereco_cliente']; ?></p>
                    <p><strong>Horário do Pedido:</strong> <?php echo date('H:i', strtotime($pedido['horario_pedido'])); ?></p>
                    <p><strong>Status:</strong> <?php echo ucfirst($pedido['status']); ?></p>
                    
                    <!-- Exibição dos itens do pedido -->
                    <p><strong>Itens do Pedido:</strong></p>
                    <?php 
                    // Verificação para exibir os itens do pedido
                    if (!empty($itens_pedido)) { 
                        // Debug: Verificar a estrutura dos itens
                        echo "<pre>";
                        var_dump($itens_pedido); 
                        echo "</pre>";
                    ?>
                        <table class="table table-bordered table-striped text-white">
                            <thead class="table-primary text-dark">
                                <tr>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Preço Unitário</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $totalGeral = 0;
                                foreach ($itens_pedido as $item) {
                                    $subtotal = $item['price'] * $item['quantity'];
                                    $totalGeral += $subtotal;
                                    ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                                        <td><?php echo $item['quantity']; ?></td>
                                        <td>R$ <?php echo number_format($item['price'], 2, ',', '.'); ?></td>
                                        <td>R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></td>
                                    </tr>
                                <?php } ?>
                                <tr class="table-secondary text-dark">
                                    <td colspan="3" class="text-end"><strong>Total Geral</strong></td>
                                    <td><strong>R$ <?php echo number_format($totalGeral, 2, ',', '.'); ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <p class="text-center">Nenhum item encontrado neste pedido.</p>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="mt-4 text-center">
            <a href="index.php" class="btn btn-primary btn-sm">Voltar</a>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$conexao->close();
?>
