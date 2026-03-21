<?php
// Paramètres de connexion (à Laragon)
$host = 'localhost';
$dbname = 'projet_progressif';
$user = 'root';
$password = '';

try {
    // Connexion via PDO pour plus de sécurité (Partie 04)
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    
    // Activation des erreurs pour le développement
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>