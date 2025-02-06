<?php
session_start();
include("protected.php");
include("navbar.php");

// Lista de produtos disponíveis com imagem
$produtos = [
    1 => ['name' => 'Copo de 200ML', 'price' => 7.50, 'image' => 'copo200.jpeg'],
    2 => ['name' => 'Copo de 300ML', 'price' => 10.50, 'image' => 'copo300.png'],
    3 => ['name' => 'Copo de 400ML', 'price' => 13.50, 'image' => 'copo400.jpeg'],
    4 => ['name' => 'Copo de 500ML', 'price' => 16.50, 'image' => 'copo500.jpeg'],
    5 => ['name' => 'Copo de 700ML', 'price' => 19.50, 'image' => 'copo700.png'],
];

// Função para adicionar produto ao carrinho
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produto_id = $_POST['produto_id'];
    $acompanhamentos = isset($_POST['acompanhamentos']) ? $_POST['acompanhamentos'] : [];
    $produto_nome = "";
    $produto_preco = 0;

    if (isset($produtos[$produto_id])) {
        $produto_nome = $produtos[$produto_id]['name'];
        $produto_preco = $produtos[$produto_id]['price'];

        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }

        // Verifica se o produto com os mesmos acompanhamentos já existe no carrinho
        $encontrado = false;
        foreach ($_SESSION['carrinho'] as &$item) {
            if ($item['id'] == $produto_id && $item['acompanhamentos'] == $acompanhamentos) {
                $item['quantity']++;
                $encontrado = true;
                break;
            }
        }

        // Adiciona o produto ao carrinho se não foi encontrado
        if (!$encontrado) {
            $_SESSION['carrinho'][] = [
                'id' => $produto_id,
                'name' => $produto_nome,
                'price' => $produto_preco,
                'quantity' => 1,
                'acompanhamentos' => $acompanhamentos
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Carrinho de Compras</title>
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
    /* Ajuste para as imagens pequenas */
    .produto-img {
        width: 120px;   /* Tamanho fixo para largura */
        height: 120px;  /* Tamanho fixo para altura */
        object-fit: cover; /* Distorce a imagem para preencher a área */
    }

    .card {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .row {
        display: flex;
        justify-content: space-around; /* Distribui os itens de forma espaçada */
        flex-wrap: wrap; /* Permite que as imagens se ajustem em múltiplas linhas se necessário */
    }

</style>
<body>
    <div class="container py-5">
        <h1 class="text-center">Açaís Premium</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-1">
            <?php
            // Agora, o array $produtos está definido antes do uso
            foreach ($produtos as $id => $produto) {
                echo "
                <div class='col'>
                    <div class='card'>
<img src='/rochedoAcai/img/{$produto['image']}' alt='{$produto['name']}' class='card-img-top produto-img'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$produto['name']}</h5>
                            <p class='card-text'>R$ " . number_format($produto['price'], 2, ',', '.') . "</p>
                            <form action='carrinho.php' method='POST' class='mt-3'>
                                <input type='hidden' name='produto_id' value='$id'>
                                <div class='mb-3'>
                                    <label class='form-label'>Escolha até dois acompanhamentos:</label>
                                    <div>
                                        <input type='checkbox' name='acompanhamentos[]' value='banana' class='form-check-input'> Banana<br>
                                        <input type='checkbox' name='acompanhamentos[]' value='granola' class='form-check-input'> Granola<br>
                                        <input type='checkbox' name='acompanhamentos[]' value='leite-condensado' class='form-check-input'> Leite Condensado<br>
                                        <input type='checkbox' name='acompanhamentos[]' value='paçoca' class='form-check-input'> Paçoca<br>
                                        <input type='checkbox' name='acompanhamentos[]' value='mel' class='form-check-input'> Mel<br>
                                    </div>
                                </div>
                                <button type='submit' class='btn btn-success' onclick='return validarSelecao()'>
                                    <i class='bi bi-cart-plus'></i> Adicionar ao carrinho
                                </button>
                            </form>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>
    <script>
        function validarSelecao() {
            const checkboxes = document.querySelectorAll("input[name='acompanhamentos[]']:checked");
            if (checkboxes.length > 2) {
                alert("Você pode escolher no máximo dois acompanhamentos.");
                return false;
            }
            return true;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
    <?php include("footer.php"); ?>
</body>
</html>
