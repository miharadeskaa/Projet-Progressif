# Projet Web Progressif - Architecture MVC

## 🚀 Description
Application web dynamique réalisée en PHP/MySQL intégrant les concepts modernes de développement (POO, MVC, API).

## 🛠️ Fonctionnalités intégrées
- **Architecture MVC** : Séparation stricte de la logique (Contrôleurs), des données (Modèles) et de l'affichage (Vues).
- **Programmation Orientée Objet** : Utilisation de la classe `MessageManager` pour la gestion des messages.
- **Sécurité** : 
  - Requêtes préparées contre les injections SQL.
  - Protection XSS via `htmlspecialchars`.
  - Gestion de session admin sécurisée.
- **API NASA** : Intégration en temps réel de l'API "Astronomy Picture of the Day" avec clé API personnelle.
- **Frontend** : 
  - Compteur de caractères dynamique en JavaScript (Classe JS).
  - Animations de défilement via la bibliothèque **AOS**.

## ⚙️ Installation
1. Importer la base de données via `install.php`.
2. Configurer `db_connect.php` avec vos identifiants locaux.
3. Accéder à l'admin avec les identifiants configurés en session.

