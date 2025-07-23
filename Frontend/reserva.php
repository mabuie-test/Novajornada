<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <!-- cola AQUI TODO o <head> do teu reserva.html -->
</head>
<body>
  <!-- cola AQUI TODO o <body> do teu reserva.html (form de pedido + secção de histórico) -->

  <script src="script.js" defer></script>
</body>
</html>
