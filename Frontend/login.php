<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <!-- cola AQUI TODO o <head> do teu login.html -->
</head>
<body>
  <!-- cola AQUI TODO o <body> do teu login.html, mantendo IDs e classes -->
  
  <script src="script.js" defer></script>
</body>
</html>
