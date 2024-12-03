<?php
include("navbar.php");
include("conexao.php");
include("protected.php");

// Verificar se a sessão está iniciada e obter o ID do cliente
if (isset($_SESSION['id'])) {
    $id_cliente = $_SESSION['id'];

    // Buscar os dados do cliente no banco de dados
    $sql = "SELECT nome, email, telefone, endereco FROM cliente WHERE idcliente = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id_cliente);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $cliente = $result->fetch_assoc();
        $nome = $cliente['nome'];
        $email = $cliente['email'];
        $telefone = $cliente['telefone'];
        $endereco = $cliente['endereco'];
    } else {
        echo "<script>alert('Erro ao buscar os dados do cliente.');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
    }
} else {
    echo "<script>alert('Você não está logado.');</script>";
    echo "<script>window.location.href = 'login.php';</script>";
}

// Verificar se o carrinho está na sessão
$carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap.min.css">
    <title>Dados da Entrega</title>
</head>
<style>
    html {
        scroll-behavior: smooth;
    }

    body {
        background: linear-gradient(45deg, #685080, #6545FF, #CC99FF);
        font-family: "Roboto", sans-serif;
        color: white;
    }

    .blur {
        backdrop-filter: blur(15px);
        background-color: rgba(255, 255, 255, 0.1);
    }
</style>

<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Formulário -->
        <div class="col-md-6 blur p-4 rounded">
            <h2 class="text-center mb-4">Preencha os Dados da Entrega</h2>
            <form action="processar_pedido.php" method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($nome); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($email); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" value="<?= htmlspecialchars($telefone); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" value="<?= htmlspecialchars($endereco); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="forma_pagamento" class="form-label">Forma de Pagamento</label>
                    <select class="form-select" id="forma_pagamento" name="forma_pagamento" required>
                        <option value="" disabled selected>Selecione</option>
                        <option value="cartao_credito">Cartão de Crédito</option>
                        <option value="pix">Pix</option>
                        <option value="boleto">Boleto</option>
                        <option value="dinheiro">Dinheiro</option>
                    </select>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Finalizar Pedido</button>
                </div>
            </form>
        </div>

        <!-- Carrinho de Compras -->
        <div class="col-md-6 blur p-4 rounded">
            <h3 class="text-center mb-4">Carrinho de Compras</h3>
            <table class="table table-bordered table-striped text-white">
                <thead>
                    <tr class="table-primary">
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Acompanhamentos</th>
                        <th>Preço Unitário</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($carrinho)) {
                        $totalGeral = 0;
                        foreach ($carrinho as $item) {
                            $subtotal = $item['price'] * $item['quantity'];
                            $totalGeral += $subtotal;

                            // Obter acompanhamentos
                            $acompanhamentos = !empty($item['acompanhamentos']) 
                                ? implode(', ', $item['acompanhamentos']) 
                                : 'Nenhum';

                            echo "<tr>
                                    <td>{$item['name']}</td>
                                    <td>{$item['quantity']}</td>
                                    <td>{$acompanhamentos}</td>
                                    <td>R$ " . number_format($item['price'], 2, ',', '.') . "</td>
                                    <td>R$ " . number_format($subtotal, 2, ',', '.') . "</td>
                                  </tr>";
                        }
                        echo "<tr class='table-secondary text-dark'>
                                <td colspan='4' class='text-end'><strong>Total Geral</strong></td>
                                <td><strong>R$ " . number_format($totalGeral, 2, ',', '.') . "</strong></td>
                              </tr>";
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>Seu carrinho está vazio!</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
<?php include("footer.php"); ?>
</body>
</html>
