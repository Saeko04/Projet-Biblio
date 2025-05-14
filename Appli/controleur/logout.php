<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Déconnexion</title>
  <!-- Redirection automatique après 5 secondes -->
  <meta http-equiv="refresh" content="index.php?action=login">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f8;
      margin: 0;
      padding: 20px;
      text-align: center;
    }
    .message {
      margin-top: 50px;
    }
    .countdown {
      font-size: 2em;
      font-weight: bold;
      color: #5c6bc0;
    }
    a {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #5c6bc0;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }
    a:hover {
      background-color: #3949ab;
    }
  </style>
</head>
<body>
  <div class="message">
    <h1>Vous êtes déconnecté</h1>
    <p>Vous allez être redirigé vers la page de connexion dans <span class="countdown" id="countdown">5</span> secondes...</p>
    <p><a href="../index.php?action=login">Cliquez ici si vous n'êtes pas redirigé</a></p>
  </div>
  <script>
    var seconds = 5;
    var countdownEl = document.getElementById("countdown");
    var interval = setInterval(function() {
      seconds--;
      countdownEl.textContent = seconds;
      if (seconds <= 0) {
        clearInterval(interval);
      }
    }, 1000);
  </script>
</body>
</html>
