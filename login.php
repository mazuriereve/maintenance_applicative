<?php
session_start();
include 'connexion.php'; // Connexion à la BDD

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les informations du formulaire
    $email_user = trim($_POST['email_user']);
    $mdp = trim($_POST['mdp']);

    // Si le mot de passe est vide, afficher un message d'erreur
    if (empty($mdp)) {
        $message = "<p class='error'>Veuillez saisir votre mot de passe.</p>";
    } else {
        if (empty($email_user)) {
            // Connexion uniquement avec le mot de passe
            // On recherche l'utilisateur où le mot de passe correspond
            $stmt = $pdo->prepare("SELECT * FROM users WHERE mdp = ?");
            $stmt->execute([$mdp]); // Ici, on compare le mot de passe en clair, sans le hacher
        } else {
            // Connexion avec l'email et le mot de passe
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email_user = ? AND mdp = ?");
            $stmt->execute([$email_user, $mdp]); // On vérifie l'email et le mot de passe
        }

        // Récupérer les données utilisateur
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Si l'utilisateur est trouvé, se connecter
            $_SESSION['connected'] = true;
            $_SESSION['nom_user'] = $user['nom_user']; // Sauvegarder le nom de l'utilisateur
            header("Location: index.php"); // Redirection vers l'accueil
            exit();
        } else {
            $message = "<p class='error'>Identifiants incorrects.</p>";
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
            <input type="email" name="email_user" placeholder="Email (optionnel)">
            <input type="password" name="mdp" placeholder="Mot de passe" required>
            <button type="submit">Se connecter</button>
        </form>
        <p><a href="page_inscription.php">Créer un compte</a></p>
    </div>
</body>
</html>
