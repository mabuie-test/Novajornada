<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <!-- cola AQUI TODO o <head> do teu index.html (meta tags, title, links a CSS/JS) -->
</head>
<body>

  <!-- NAVBAR: substitui apenas os links .html → .php e introduz sessão -->
  <nav>
    <button class="mobile-menu-btn" id="mobile-menu-btn">
      <i class="fas fa-bars"></i>
    </button>
    <ul id="main-menu">
      <li><a href="index.php"><i class="fas fa-home"></i> Início</a></li>
      <li><a href="index.php#services"><i class="fas fa-ship"></i> Serviços</a></li>
      <li><a href="index.php#about"><i class="fas fa-info-circle"></i> Sobre</a></li>
      <li>
        <a href="<?= isset($_SESSION['user_id']) ? 'reserva.php' : 'login.php' ?>">
          <i class="fas fa-clipboard-list"></i> Pedido
        </a>
      </li>
      <li><a href="index.php#contact"><i class="fas fa-envelope"></i> Contato</a></li>
      <?php if(isset($_SESSION['user_id'])): ?>
        <li><a href="reserva.php"><i class="fas fa-history"></i> Histórico</a></li>
        <?php if($_SESSION['role']==='admin'): ?>
          <li><a href="admin.php"><i class="fas fa-cog"></i> Admin</a></li>
        <?php endif; ?>
        <li><button id="logoutBtn"><i class="fas fa-sign-out-alt"></i> Logout</button></li>
      <?php else: ?>
        <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
        <li><a href="register.php"><i class="fas fa-user-plus"></i> Registro</a></li>
      <?php endif; ?>
    </ul>
  </nav>

  <!-- cola AQUI TODO o resto do <body> do teu index.html (seções, imagens, footer, etc.) -->

  <script src="script.js" defer></script>
</body>
</html>
