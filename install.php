<?php
require 'db_connect.php'; // Utilise votre fichier de connexion [cite: 2, 8]

try {
    $sql = "CREATE TABLE IF NOT EXISTS messages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(255) NOT NULL,
        contenu TEXT NOT NULL,
        date_envoi TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    $pdo->exec($sql);
    echo "La table 'messages' a été créée avec succès !";
} catch (PDOException $e) {
    echo "Erreur lors de la création : " . $e->getMessage();
}
?>