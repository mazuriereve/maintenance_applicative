<?php
include 'connexion.php'; // Connexion à la BDD

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_user = trim($_POST['nom_user']);
    $email_user = trim($_POST['email_user']);
    $mdp = trim($_POST['mdp']);

    // Vérification que tous les champs sont remplis
    if (empty($nom_user) || empty($email_user) || empty($mdp)) {
        $message = "<p class='error'>Tous les champs sont obligatoires.</p>";
    } elseif (!filter_var($email_user, FILTER_VALIDATE_EMAIL)) {
        $message = "<p class='error'>Email invalide.</p>";
    } else {
        // Vérifier si l'email existe déjà
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email_user = ?");
        $stmt->execute([$email_user]);
        
        if ($stmt->rowCount() > 0) {
            $message = "<p class='error'>Cet email est déjà utilisé.</p>";
        } else {
            // Hachage du mot de passe
            $mdp_hash = password_hash($mdp, PASSWORD_BCRYPT);

            // Insertion dans la base de données
            $stmt = $pdo->prepare("INSERT INTO users (nom_user, email_user, mdp) VALUES (?, ?, ?)");
            if ($stmt->execute([$nom_user, $email_user, $mdp_hash])) {
                $message = "<p class='success'>Inscription réussie !</p>";
            } else {
                $message = "<p class='error'>Erreur lors de l'inscription.</p>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>
        <?= $message; ?>
        <form action="" method="POST">
            <input type="text" name="nom_user" placeholder="Nom d'utilisateur" required>
            <input type="email" name="email_user" placeholder="Email" required>
            <input type="password" name="mdp" placeholder="Mot de passe" required>
            <button type="submit">S'inscrire</button>
        </form>
    </div>
</body>
</html>
