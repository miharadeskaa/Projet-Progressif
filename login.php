<?php
session_start();
require_once 'db_connect.php'; // On se connecte à la BDD
require_once 'models/MessageManager.php'; 

// --- PARTIE SÉCURITÉ ---
// On simule une connexion ou on vérifie si la session existe

$_SESSION['admin'] = true; 

// --- PARTIE LOGIQUE (Le Contrôleur) ---
$manager = new MessageManager($pdo); 
$messages = $manager->getAllMessages(); 

// --- PARTIE AFFICHAGE (La Vue) ---
include 'views/admin_view.php';
?>

