<?php
// config.php — connexion à la base de données (si tu stockes tes projets en BDD)
// Sinon, tu peux laisser projets.php avec un tableau PHP statique et ignorer ce fichier.

$DB_HOST = 'localhost';
$DB_NAME = 'portfolio';
$DB_USER = 'root';
$DB_PASS = '';

try {
    $pdo = new PDO(
        "mysql:host={$DB_HOST};dbname={$DB_NAME};charset=utf8mb4",
        $DB_USER,
        $DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    // En prod, ne jamais afficher $e->getMessage() directement à l'utilisateur
    die('Connexion à la base de données impossible.');
}
