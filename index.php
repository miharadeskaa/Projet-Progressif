<?php include 'header.php'; ?>

<main class="centered-content">
    <section class="apod-section" data-aos="fade-up">
        <p class="apod-label">Exploration</p>
        
        <div class="apod-card">
            <div class="apod-header">
                <span class="apod-header-title">NASA API</span>
                <span class="apod-header-date" id="apod-date">Chargement...</span>
            </div>

            <div class="apod-image-wrap" id="apod-media-container">
                <div style="padding: 40px; text-align: center; color: var(--text-muted);">
                    Connexion aux serveurs de la NASA en cours... 📡
                </div>
            </div>

            <div class="apod-body">
                <h3 class="apod-title" id="apod-title">Recherche de signaux...</h3>
                <p class="apod-desc" id="apod-desc">Veuillez patienter pendant le téléchargement des données interstellaires.</p>
            </div>

            <div class="apod-footer">
                <span class="apod-source">Crédits : <span id="apod-copyright">...</span></span>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>