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
  <!-- cola AQUI TODO o <head> do teu register.html -->
</head>
<body>
  <!-- cola AQUI TODO o <body> do teu register.html -->

  <script src="script.js" defer></script>
</body>
</html>
