<?php
session_start();
include 'connexion.php'; // Connexion à la BDD

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mdp = trim($_POST['mdp']);

    if (empty($mdp)) {
        $message = "<p class='error'>Veuillez remplir tous les champs.</p>";
    } else {
        // Récupérer **le premier utilisateur** de la base de données
        $stmt = $pdo->query("SELECT * FROM users LIMIT 1");
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($mdp, $user['mdp'])) {
            $_SESSION['connected'] = true;
            $_SESSION['nom_user'] = $user['nom_user']; // Connexion réussie peu importe l'email
            header("Location: index.php"); 
            exit();
        } else {
            $message = "<p class='error'>Mot de passe incorrect.</p>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>
        <?= $message; ?>
        <form action="" method="POST">
            <input type="email" name="email_user" placeholder="Email" required>
            <input type="password" name="mdp" placeholder="Mot de passe" required>
            <button type="submit">Se connecter</button>
        </form>
        <p><a href="page_inscription.php">Créer un compte</a></p>
    </div>
</body>
</html>
