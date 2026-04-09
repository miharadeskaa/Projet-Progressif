<?php
class UserManager {
    private $pdo;

    // On reçoit la connexion PDO (définie dans db_connect.php)
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // --- MÉTHODE 1 : INSCRIPTION ---
    public function registerUser($email, $password) {
        // Sécurité : caché le mot de passe avec des caractères spéciaux
        // password_hash crée une empreinte numérique unique.
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        try {
            $stmt = $this->pdo->prepare("INSERT INTO utilisateurs (email, mot_de_passe) VALUES (:email, :password)");
            return $stmt->execute([
                'email' => $email,
                'password' => $hashedPassword
            ]);
        } catch (PDOException $e) {
            // Retourne faux si l'email existe déjà 
            return false; 
        }
    }

    // --- MÉTHODE 2 : CONNEXION ---
    public function verifyUser($email, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // password_verify compare le texte saisi avec l'empreinte hachée
        if ($user && password_verify($password, $user['mot_de_passe'])) {
            return $user; // Succès : on renvoie les infos de l'utilisateur
        }
        
        return false; // Échec : identifiants incorrects
    }
}
?>