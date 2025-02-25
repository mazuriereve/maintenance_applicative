<?php
session_start();
include 'connexion.php'; // Connexion à la BDD

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_user = trim($_POST['email_user']);
    $mdp = trim($_POST['mdp']);

    if (empty($email_user) || empty($mdp)) {
        $message = "<p class='error'>Veuillez remplir tous les champs.</p>";
    } else {
        // Vérifier si l'utilisateur existe
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email_user = ?");
        $stmt->execute([$email_user]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($mdp, $user['mdp'])) {
            $_SESSION['connected'] = true;
            $_SESSION['nom_user'] = $user['nom_user']; // Sauvegarde du nom
            header("Location: index.php"); // Redirection vers l'accueil
            exit();
        } else {
            $message = "<p class='error'>Email ou mot de passe incorrect.</p>";
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
