# Projet Web Progressif - Architecture MVC

## 🚀 Description
Application web dynamique réalisée en PHP/MySQL intégrant les concepts modernes de développement (POO, MVC, API).

## 🛠️ Fonctionnalités intégrées
- **Architecture MVC** : Séparation stricte de la logique (Contrôleurs), des données (Modèles) et de l'affichage (Vues).
- **Gestion des Utilisateurs** : Système complet d'inscription et de connexion avec gestion de session.
- **Programmation Orientée Objet (POO)** : 
  - PHP : Classes `MessageManager` (contacts) et `UserManager` (utilisateurs).
  - JavaScript : Classe `NasaApiManager` pour la gestion des données externes.
- **Sécurité Avancée** : 
  - Hachage sécurisé des mots de passe via `password_hash()` et `password_verify()`.
  - Requêtes préparées (PDO) contre les injections SQL.
  - Protection XSS via `htmlspecialchars`.
- **API NASA (Fetch API)** : Récupération asynchrone en JavaScript de l'image du jour (APOD) avec intégration dynamique dans le DOM.
- **Frontend & UX** : 
  - Formulaires optimisés (autocomplete désactivé, compteur de caractères JS).
  - Animations de défilement via la bibliothèque **AOS**.

## ⚙️ Installation
1. Importer le fichier `database.sql` dans votre gestionnaire de base de données.
2. Configurer `db_connect.php` avec vos identifiants locaux si nécessaire.
3. Utiliser le formulaire d'inscription dans l'Espace Admin pour créer un compte test.