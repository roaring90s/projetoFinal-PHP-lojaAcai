<?php 

// Incluir a conexão com o banco de dados e a verificação de sessão
include("conexao.php");
include("protected.php");

// Verificar se o cliente está logado
if (!isset($_SESSION['id'])) {
    echo "<script>alert('Você não está logado.');</script>";
    echo "<script>window.location.href = 'login.php';</script>";
    exit();
}

// Obter os dados do cliente da sessão
$cliente_id = $_SESSION['id'];
$nome_cliente = $_POST['nome'];
$email_cliente = $_POST['email'];
$telefone_cliente = $_POST['telefone'];
$endereco_cliente = $_POST['endereco'];
$forma_pagamento = $_POST['forma_pagamento'];

// Inicializar a variável $totalGeral
$totalGeral = 0;

// Obter os itens do carrinho
$carrinho = isset($_POST['carrinho']) ? $_POST['carrinho'] : [];

// Array para armazenar os itens do pedido (vai ser convertido em JSON)
$itens = [];

// Loop para calcular o total geral do pedido e armazenar os itens
foreach ($carrinho as $itemJson) {
    $item = json_decode($itemJson, true);
    $subtotal = $item['price'] * $item['quantity'];
    $totalGeral += $subtotal;

    // Adicionar os acompanhamentos à descrição do item
    $acompanhamentos = !empty($item['acompanhamentos']) 
        ? implode(', ', $item['acompanhamentos']) 
        : 'Nenhum';

    // Criar uma descrição detalhada do item (ex: "Copo 200ml, Leite Condensado, Granola")
    $descricao_item = "{$item['name']}, {$acompanhamentos}";

    // Adiciona o item ao array de itens
    $itens[] = [
        'nome' => $descricao_item,
        'quantidade' => $item['quantity'],
        'preco_unitario' => $item['price'],
        'subtotal' => $subtotal
    ];
}

// Converter os itens para JSON
$itens_json = json_encode($itens);

// Verifique se as variáveis são válidas antes de tentar inseri-las no banco
if (is_null($forma_pagamento) || is_null($totalGeral) || is_null($cliente_id) || is_null($endereco_cliente) || is_null($itens_json)) {
    echo "<script>alert('Erro: Dados inválidos.');</script>";
    echo "<script>window.location.href = 'dadosEntrega.php';</script>";
    exit();
}

// Exibir variáveis para debug
echo "<pre>";
echo "Forma de pagamento: $forma_pagamento\n";
echo "Endereço: $endereco_cliente\n";
echo "Total Geral: $totalGeral\n";
echo "Itens: $itens_json\n";
echo "</pre>";

// Inserir o pedido na tabela 'pedido' com o valor total e os itens diretamente na tabela de pedidos
$sql_insert_pedido = "INSERT INTO pedido (data_pedido, status, forma_pagamento, valor_total, horario_pedido, cliente_idcliente, endereco_cliente, itens_pedido) 
                     VALUES (NOW(), 'pendente', ?, ?, NOW(), ?, ?, ?)";
$stmt = $conexao->prepare($sql_insert_pedido);

// Verifique se a preparação da query foi bem-sucedida
if (!$stmt) {
    echo "Erro na preparação da consulta: " . $conexao->error;
    exit();
}

// Garantir que os valores estão corretos para o bind_param
$stmt->bind_param("sdiss", $forma_pagamento, $totalGeral, $cliente_id, $endereco_cliente, $itens_json);

// Executar a inserção do pedido
if ($stmt->execute()) {
    // Após inserir o pedido, obter o id do pedido inserido
    $id_pedido = $stmt->insert_id;

    // Gerar nota fiscal - inserir na tabela 'nota_fiscal' (se necessário)
    $nome_estabelecimento = "Seu Estabelecimento"; // Substitua conforme necessário
    $endereco_estabelecimento = "Rua Exemplo, 123"; // Substitua conforme necessário

    foreach ($itens as $item) {
        $sql_insert_nota = "INSERT INTO nota_fiscal (nomeestabelecimento, endereco, data, quantidade, valor, formapagamento) 
                           VALUES (?, ?, NOW(), ?, ?, ?)";
        $stmt_nota = $conexao->prepare($sql_insert_nota);
        $stmt_nota->bind_param("ssids", $nome_estabelecimento, $endereco_estabelecimento, $item['quantidade'], $item['preco_unitario'], $forma_pagamento);
        $stmt_nota->execute();
    }

    // Redirecionar para a página de sucesso ou outra página apropriada
    echo "<script>alert('Pedido realizado com sucesso!');</script>";
    echo "<script>window.location.href = 'confirmacao_pedido.php?id=$id_pedido';</script>";
} else {
    echo "<script>alert('Erro ao processar o pedido. Tente novamente.');</script>";
    echo "<script>window.location.href = 'dadosEntrega.php';</script>";
}

?>
