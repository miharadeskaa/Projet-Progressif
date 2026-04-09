<?php include '../header.php'; ?>

<main class="centered-content">
    <section class="apod-section" data-aos="fade-up">
        
        <div class="apod-card" style="padding: 30px; max-width: 400px; margin: 0 auto; width: 100%;">
            <h2 style="text-align:center; margin-bottom: 20px;">Espace Administrateur</h2>

            <?php if (!empty($success_message)): ?>
                <p style="color: #4CAF50; text-align: center; margin-bottom:15px; font-weight: bold;"><?php echo $success_message; ?></p>
            <?php endif; ?>

            <?php if (!empty($error_message)): ?>
                <p style="color: #f44336; text-align: center; margin-bottom:15px; font-weight: bold;"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <form method="POST" action="auth_controller.php" style="display: flex; flex-direction: column; gap: 15px;">
                <input type="hidden" name="action" value="login">
                <input type="email" name="email" placeholder="Adresse email" required autocomplete="off" style="padding: 10px; border-radius: 5px; border: 1px solid var(--border-color); background: var(--bg-body); color: var(--text-main);">
                <input type="password" name="password" placeholder="Mot de passe" required style="padding: 10px; border-radius: 5px; border: 1px solid var(--border-color); background: var(--bg-body); color: var(--text-main);">
                <button type="submit" style="padding: 10px; border-radius: 5px; background: #645ac8; color: white; border: none; cursor: pointer; font-weight: bold; font-size: 14px;">Se connecter</button>
            </form>

            <hr style="margin: 25px 0; border: 0; border-top: 1px solid var(--border-color);">

            <h3 style="text-align:center; font-size: 13px; color: var(--text-muted); margin-bottom: 15px; text-transform: uppercase;">Nouveau membre ?</h3>

            <form method="POST" action="auth_controller.php" style="display: flex; flex-direction: column; gap: 15px;">
                <input type="hidden" name="action" value="register">
                <input type="email" name="email" placeholder="Nouvel email" required autocomplete="off" style="padding: 10px; border-radius: 5px; border: 1px solid var(--border-color); background: var(--bg-body); color: var(--text-main);">
                <input type="password" name="password" placeholder="Nouveau mot de passe" required style="padding: 10px; border-radius: 5px; border: 1px solid var(--border-color); background: var(--bg-body); color: var(--text-main);">
                <button type="submit" style="padding: 10px; border-radius: 5px; background: transparent; color: #645ac8; border: 1px solid #645ac8; cursor: pointer; font-weight: bold; font-size: 14px;">S'inscrire</button>
            </form>
            
        </div>
    </section>
</main>

<?php include '../footer.php'; ?>