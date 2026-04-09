<?php
session_start(); // On démarre la session pour gérer la connexion
require_once '../db_connect.php'; // Connexion à la base de données
require_once '../models/UserManager.php'; // On inclut le modèle pour les utilisateurs

$userManager = new UserManager($pdo); // On instancie le manager avec la connexion PDO
$error_message = '';
$success_message = '';

// On vérifie si le formulaire a été envoyé via la méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($email) && !empty($password)) {
        
        // --- INSCRIPTION ---
        if ($action === 'register') {
            if ($userManager->registerUser($email, $password)) {
                $success_message = "Compte créé avec succès ! Connectez-vous ci-dessus.";
            } else {
                $error_message = "Erreur : Cet email est peut-être déjà utilisé.";
            }
        }
        
        // --- CONNEXION ---
        elseif ($action === 'login') {
            $user = $userManager->verifyUser($email, $password);
            
            if ($user) {
                // Succès ! On stocke les infos en session
                $_SESSION['admin'] = true;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                
                // Redirection vers l'espace admin après la connexion
                header('Location: ../login.php');
                exit;
            } else {
                $error_message = "Email ou mot de passe incorrect.";
            }
        }
    } else {
        $error_message = "Veuillez remplir tous les champs.";
    }
}

// Enfin, on charge la vue pour afficher le formulaire ou les erreurs
include '../views/auth_view.php';
?>