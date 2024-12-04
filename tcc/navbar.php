<?php
// Inicia a sessão apenas se ainda não estiver ativa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o usuário está logado
$loggedIn = isset($_SESSION['usuario']);
?>

<nav class="navbar bg-light navbar-expand-sm py-1">
  <div class="container">
    <a href="index.php" class="navbar-brand d-flex align-items-center">
      <img src="\ProjetoTCC\img\LOGO-Rochedo2.ai.png" alt="Logo Rochedo Açaí" height="20%" width="20%">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="menuNavbar">
      <div class="navbar-nav">
        <a href="index.php" class="nav-link">Ínicio</a>
        <a href="pedido.php" class="nav-link">Cardápio</a>
        <?php if ($loggedIn): ?>
          <a href="logout.php" class="nav-link">Logoff<i class="bi bi-box-arrow-right"></i></a>
        <?php else: ?>
          <a href="login.php" class="nav-link">Login<i class="bi bi-person-fill"></i></a>
        <?php endif; ?>
        <a href="meuCarrinho.php" class="nav-link">
          <i class="bi bi-cart" alt="carrinho" style="font-size: 16px;"></i>
        </a>
      </div>
    </div>
  </div>
</nav>
