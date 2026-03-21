<?php
class MessageManager {
    private $pdo;

    // Le constructeur reçoit la connexion à la base de données
    public function __construct($database) {
        // CORRECTION : On écrit $this->pdo (avec le $)
        $this->pdo = $database;
    }

    // Méthode pour enregistrer un message (Partie 04 & 06)
    public function saveMessage($nom, $contenu) {
        $stmt = $this->pdo->prepare("INSERT INTO messages (nom, contenu) VALUES (:nom, :contenu)");
        return $stmt->execute([
            'nom' => $nom,
            'contenu' => $contenu
        ]);
    }

    // Méthode pour récupérer tous les messages (Admin)
    public function getAllMessages() {
    $query = $this->pdo->query("SELECT * FROM messages ORDER BY date_envoi DESC");
    return $query->fetchAll(PDO::FETCH_ASSOC);}
}

?>