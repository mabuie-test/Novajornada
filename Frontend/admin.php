<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <!-- cola AQUI TODO o <head> do teu admin.html -->
</head>
<body>
  <!-- cola AQUI TODO o <body> do teu admin.html (tabela de pedidos, botões de status, etc.) -->

  <script src="script.js" defer></script>
</body>
</html>
