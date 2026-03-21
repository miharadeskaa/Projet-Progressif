document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('theme-toggle');
    
    // Appliquer le thème sauvegardé au démarrage
    const savedTheme = localStorage.getItem('theme') || 'dark';
    document.documentElement.setAttribute('data-theme', savedTheme);

    if (btn) {
        btn.addEventListener('click', () => {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            console.log("Thème actuel : " + newTheme);
        });
    }
});