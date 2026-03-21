<?php
session_start();
require_once 'db_connect.php'; // On se connecte à la BDD
require_once 'models/MessageManager.php'; // On appelle ton modèle

// --- PARTIE SÉCURITÉ (Admin simple pour l'examen) ---
// On simule une connexion ou on vérifie si la session existe
// Pour le projet, on considère que si on arrive ici, on veut voir les messages
$_SESSION['admin'] = true; 

// --- PARTIE LOGIQUE (Le Contrôleur) ---
$manager = new MessageManager($pdo); // On utilise $pdo (vérifie le nom dans db_connect.php)
$messages = $manager->getAllMessages(); // On récupère la liste des messages

// --- PARTIE AFFICHAGE (La Vue) ---
include 'views/admin_view.php';
?>

