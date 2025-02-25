<?php
session_start();
$isConnected = isset($_SESSION['connected']) && $_SESSION['connected'];
$nom_user = isset($_SESSION['nom_user']) ? $_SESSION['nom_user'] : '';

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <?php if ($isConnected): ?>
                <a href="?logout=1" class="button">Se déconnecter</a>
                <span class="status">Bonjour, <?= htmlspecialchars($nom_user); ?> ! 👋</span>
            <?php else: ?>
                <a href="login.php" class="button">Se connecter</a>
                <span class="status">Non connecté</span>
            <?php endif; ?>
        </div>
        <div class="content">
            <h1>Bienvenue sur la page d'accueil !</h1>
            <p>Ceci est une page basique avec un bouton de connexion.</p>
        </div>
    </div>
</body>
</html>
