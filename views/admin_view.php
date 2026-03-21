<?php include 'header.php'; ?>
<main class="centered-content">
<div class="admin-container">
    <h1 style="color: #ffffff; margin-bottom: 20px;">🚀 Panneau d'Administration</h1>
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <p style="color: #a09acc;">Bienvenue dans votre espace sécurisé.</p>
        <a href="/Projet-Progressif/logout.php" class="btn-logout">Déconnexion</a>
    </div>

    <?php if (empty($messages)): ?>
        <p style="color: #6b6b9a; font-style: italic;">Aucun message reçu pour le moment.</p>
    <?php else: ?>
        <?php foreach ($messages as $m): ?>
            <div class="message-card" data-aos="fade-up">
                <div class="message-header">
                    <span class="message-author">👤 <?php echo htmlspecialchars($m['nom']); ?></span>
                    <span class="message-date">Envoyé le : <?php echo $m['date_envoi'] ?? 'Non renseignée'; ?></span>
                </div>
                <div class="message-text">
                    <p class="message-text"><?php echo htmlspecialchars($m['contenu'] ?? ''); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
</main>
<?php include 'footer.php'; ?>