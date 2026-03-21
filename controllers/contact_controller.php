<?php
// LE CONTRÔLEUR (Partie 07)
require_once '../db_connect.php';
require_once '../models/MessageManager.php';

$manager = new MessageManager($pdo);
$message_confirmation = "";

// Logique du contrôleur : on traite les données avant de les envoyer à la vue
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nom']) && !empty($_POST['message'])) {
    if ($manager->saveMessage($_POST['nom'], $_POST['message'])) {
        $message_confirmation = "🚀 Transmission réussie ! Votre message a été reçu dans la station.";
    }
}

// À la fin, le contrôleur appelle la vue
include '../views/contact_view.php';
?>