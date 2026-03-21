<?php include '../header.php'; ?>

<main class="centered-content">
    <section data-aos="fade-up">
        <h1>Contactez-nous</h1>
        
        <?php if (isset($message_confirmation) && $message_confirmation): ?>
            <p style="text-align:center; color:#a09acc; margin-bottom:20px;">
                <div style="
        background: rgba(100, 90, 200, 0.15);
        border: 1px solid #645ac8;
        color: #ddd8f8;
        padding: 15px;
        border-radius: 10px;
        text-align: center;
        margin-bottom: 25px;
        font-size: 0.9rem;
        animation: fadeIn 0.5s ease-out;">          
        </div>
                <?php echo $message_confirmation; ?>
            </p>
        <?php endif; ?>

        <form action="" method="POST">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required>

            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>
            <div id="counter">0 / 200</div>

            <button type="submit">Envoyer le message</button>
        </form>
    </section>
</main>
<script>
    const textarea = document.getElementById('message');
    const counter = document.getElementById('counter');

    textarea.addEventListener('input', () => {
        const length = textarea.value.length;
        counter.textContent = `${length} / 200`;

        
        if (length > 200) {
            counter.style.color = "#ff4d4d";
        } else {
            counter.style.color = "#645ac8";
        }
    });
</script>
<?php include '../footer.php'; ?>