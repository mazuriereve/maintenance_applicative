<?php
// Informations de connexion à la base de données
$host = ""; // Remplacez par l'hôte de votre serveur MySQL
$dbname = "";
$user = "";
$password = "";

// Chaîne de connexion à la base de données
$dsn = "mysql:host=$host;dbname=$dbname;user=$user;password=$password";


try {
    // Connexion à la base de données
    $db = new PDO($dsn);
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    die();
}