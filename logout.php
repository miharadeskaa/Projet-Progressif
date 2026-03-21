<?php
// On démarre la session pour pouvoir y accéder
session_start();

// On détruit toutes les variables de session 
session_destroy();

// On redirige l'utilisateur vers la page d'accueil
header('Location: index.php');
exit;
?>