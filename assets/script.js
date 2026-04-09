// Création de la classe demandée par le cahier des charges
class NasaApiManager {
    
    // Le constructeur s'initialise avec la clé API
    constructor(apiKey) {
        this.apiKey = apiKey;
        this.apiUrl = `https://api.nasa.gov/planetary/apod?api_key=${this.apiKey}&count=1`;
    }

    // Méthode asynchrone pour récupérer les données via FETCH
    async fetchAstronomyPicture() {
        try {
            const response = await fetch(this.apiUrl);
            
            if (!response.ok) {
                throw new Error(`Erreur réseau : ${response.status}`);
            }
            
            // On transforme la réponse en JSON
            const dataArray = await response.json();
            const data = dataArray[0]; 
            
            // On envoie les données à la méthode d'affichage
            this.displayData(data);
            
        } catch (error) {
            console.error("Erreur lors de l'appel à l'API NASA :", error);
            this.displayFallback(); 
        }
    }

    // Méthode pour injecter les données dans le HTML
    displayData(data) {
        // Remplissage du texte
        document.getElementById('apod-title').textContent = data.title;
        document.getElementById('apod-desc').textContent = data.explanation;
        
        // Formatage de la date en français
        const dateObj = new Date(data.date);
        document.getElementById('apod-date').textContent = dateObj.toLocaleDateString('fr-FR', { day: '2-digit', month: 'short', year: 'numeric' });
        
        // Gestion des droits d'auteur AVEC LIEN CLIQUABLE
        const copyright = data.copyright ? data.copyright.trim() : 'NASA';
        const imageUrl = data.hdurl || data.url; // On prépare le lien HD
        document.getElementById('apod-copyright').innerHTML = `<a href="${imageUrl}" target="_blank" style="color: inherit; text-decoration: underline;" title="Voir l'image originale">${copyright}</a>`;

        // L'image est cliquable aussi pour l'agrandir, et on gère les vidéos
        const mediaContainer = document.getElementById('apod-media-container');
        mediaContainer.innerHTML = ''; 

        if (data.url.includes('youtube.com') || data.url.includes('vimeo.com')) {
            mediaContainer.innerHTML = `
                <div class="apod-video-wrap" style="padding: 20px; text-align: center;">
                    <p style="margin-bottom: 10px;">Découverte en vidéo</p>
                    <a href="${data.url}" target="_blank" class="apod-video-link" style="color: #645ac8; text-decoration: underline;">Voir sur la plateforme vidéo</a>
                </div>
            `;
        } else {
            mediaContainer.innerHTML = `
                <a href="${imageUrl}" target="_blank" title="Cliquez pour agrandir">
                    <img src="${data.url}" alt="${data.title}" style="max-width: 100%; height: auto; border-radius: 8px; cursor: zoom-in;">
                </a>
            `;
        }
    } // <-- C'EST CETTE ACCOLADE QUI MANQUAIT !

    // Méthode de secours si l'API ne répond pas
    displayFallback() {
        document.getElementById('apod-title').textContent = "Exploration Spatiale";
        document.getElementById('apod-desc').textContent = "La NASA nous fait voyager, même quand l'API se repose.";
        document.getElementById('apod-date').textContent = new Date().toLocaleDateString('fr-FR');
        document.getElementById('apod-copyright').textContent = "NASA";
        
        const mediaContainer = document.getElementById('apod-media-container');
        mediaContainer.innerHTML = `<img src="https://images-assets.nasa.gov/image/PIA08653/PIA08653~medium.jpg" alt="Cosmos par défaut" style="max-width: 100%; height: auto; border-radius: 8px;">`;
    }
}

// Quand la page est complètement chargée
document.addEventListener('DOMContentLoaded', () => {
    // On instancie la classe avec ta clé API
    const nasaApp = new NasaApiManager("A5DGucgcmHLofv9w4AeeWBXqu7x9t6Is6dtVd8pJ");
    nasaApp.fetchAstronomyPicture();
});