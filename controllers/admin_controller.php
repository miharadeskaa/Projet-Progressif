<?php
// 1. DÉMARRAGE DE LA SESSION (Toujours en premier !)
session_start(); 

// 2. CONNEXION À LA BASE (On remonte d'un dossier)
require '../db_connect.php'; 

// 3. VÉRIFICATION DE LA SÉCURITÉ
if (!isset($_SESSION['admin'])) { 
    // On remonte pour trouver login.php à la racine
    header('Location:/login.php');
    exit;
}

// 4. INCLUSION DU HAUT DE PAGE
include 'header.php'; 
?>

<section data-aos="fade-in">
    <h1>Espace Administration - Messages reçus</h1>
    
    <table border="1" style="width:100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 10px;">Nom</th>
                <th style="padding: 10px;">Message</th>
                <th style="padding: 10px;">Date d'envoi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // RÉCUPÉRATION DES DONNÉES
            $reponse = $pdo->query("SELECT * FROM messages ORDER BY date_envoi DESC"); 
            
            while ($donnees = $reponse->fetch()) {
                echo "<tr>";
                // PROTECTION XSS (Partie 06)
                echo "<td style='padding: 10px;'>" . htmlspecialchars($donnees['nom']) . "</td>"; 
                echo "<td style='padding: 10px;'>" . htmlspecialchars($donnees['contenu']) . "</td>"; 
                echo "<td style='padding: 10px;'>" . $donnees['date_envoi'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <div style="margin-top: 30px;">
        <a href="../logout_view.php" style="color: red; font-weight: bold;">Se déconnecter</a>
    </div>
</section>

<?php 
// INCLUSION DU PIED DE PAGE
include 'footer.php'; 
?>