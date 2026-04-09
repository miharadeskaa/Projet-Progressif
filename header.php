<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌌 Cosmos Explorer</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🌌</text></svg>">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="/Projet-Progressif/assets/style.css">
    
    <style>
        
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background-color: var(--bg-body); 
            color: var(--text-main);          
            font-family: 'Segoe UI', system-ui, sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }

        header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: var(--bg-card); 
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-color);
            padding: 0 32px;
        }

        nav {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center; 
            height: 58px;
            gap: 40px; 
        }

        .nav-brand {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-muted);
            letter-spacing: 0.15em;
            text-transform: uppercase;
            text-decoration: none;
        }

        nav ul {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 15px; 
        }

        nav ul li a {
            font-size: 13px;
            color: var(--text-main);
            text-decoration: none;
            padding: 6px 14px;
            border-radius: 20px;
            transition: all 0.2s;
        }

        nav ul li a:hover {
            color: var(--text-bright);
            background: rgba(100, 90, 200, 0.18);
        }

        nav ul li.nav-admin a {
            color: #c4b8f0;
            border: 1px solid var(--border-color);
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>                                
    <li><a href="/Projet-Progressif/index.php">Accueil</a></li>
    <li><a href="/Projet-Progressif/controllers/contact_controller.php">Contact</a></li>
    <li class="nav-admin"><a href="/Projet-Progressif/controllers/auth_controller.php">Espace Admin</a></li>
    <li>
        <button id="theme-toggle" onclick="toggleTheme()" style="background:none; border:none; cursor:pointer; font-size:13px; margin-left:15px; display: flex; align-items: center; color: var(--text-main); gap: 8px;">
            <span id="theme-text">Mode Sombre</span> 🌓
        </button>
    </li>
</ul>

<script>
function updateThemeUI(theme) {
    const textElement = document.getElementById('theme-text');
    if (textElement) {
        textElement.textContent = (theme === 'dark') ? 'Mode Sombre' : 'Mode Clair';
    }
}

function toggleTheme() {
    const html = document.documentElement;
    const currentTheme = html.getAttribute('data-theme') || 'dark';
    const newTheme = (currentTheme === 'dark') ? 'light' : 'dark';
    
    html.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);
    updateThemeUI(newTheme);
}

// Appliquer au chargement
(function() {
    const savedTheme = localStorage.getItem('theme') || 'dark';
    document.documentElement.setAttribute('data-theme', savedTheme);
    
    window.addEventListener('DOMContentLoaded', () => updateThemeUI(savedTheme));
})();
</script>
        </nav>
    </header>