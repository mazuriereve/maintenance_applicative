<?php
$host = "localhost"; // Serveur MySQL
$dbname = "maintenance_applicative"; // Nom de la base de données
$username = "root"; // Nom d'utilisateur MySQL
$password = "root"; // Mot de passe MySQL (laisser vide sous XAMPP)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>