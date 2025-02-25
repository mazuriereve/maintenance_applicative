<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    session_start();
    $isConnected = isset($_SESSION['connected']) && $_SESSION['connected'];
    if (isset($_GET['toggle'])) {
        $isConnected = !$isConnected;
        $_SESSION['connected'] = $isConnected;
        header('Location: index.php');
        exit();
    }
    ?>
    <div class="container">
        <div class="header">
            <a href="?toggle=1" class="button">
                <?= $isConnected ? 'Se déconnecter' : 'Se connecter' ?>
            </a>
            <span class="status">
                <?= $isConnected ? 'Connecté' : 'Non connecté' ?>
            </span>
        </div>
        <div class="content">
            <h1>Bienvenue sur la page d'accueil !</h1>
            <p>Ceci est une page basique avec un bouton de connexion en haut à gauche.</p>
        </div>
    </div>
</body>
</html>
