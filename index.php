<?php
include 'header.php';

$apiKey = "A5DGucgcmHLofv9w4AeeWBXqu7x9t6Is6dtVd8pJ";
$url = "https://api.nasa.gov/planetary/apod?api_key=" . $apiKey . "&count=1";

$response = @file_get_contents($url);

if ($response) {
    $data_array  = json_decode($response, true);
    $data        = $data_array[0];
    $image_url   = $data['url'];
    $image_title = $data['title'];
    $image_desc  = $data['explanation'];
    $image_date  = $data['date'] ?? date('Y-m-d');
    $image_copy  = isset($data['copyright']) ? trim($data['copyright']) : 'NASA';
} else {
    $image_url   = "https://images-assets.nasa.gov/image/PIA08653/PIA08653~medium.jpg";
    $image_title = "Exploration Spatiale";
    $image_desc  = "La NASA nous fait voyager, même quand l'API se repose.";
    $image_date  = date('Y-m-d');
    $image_copy  = "NASA";
}

$is_video = strpos($image_url, 'youtube.com') !== false
         || strpos($image_url, 'vimeo.com')   !== false;

$date_fr = date('d M Y', strtotime($image_date));
?>

<main class="centered-content">
    <section class="apod-section" data-aos="fade-up">
        <p class="apod-label">Exploration</p>
        
        <div class="apod-card">
            <div class="apod-header">
                <span class="apod-header-title">NASA API</span>
                <span class="apod-header-date"><?php echo $date_fr; ?></span>
            </div>

            <div class="apod-image-wrap">
                <?php if (!$is_video): ?>
                    <img src="<?php echo $image_url; ?>" alt="Cosmos">
                <?php else: ?>
                    <div class="apod-video-wrap">
                        <p>Découverte en vidéo</p>
                        <a href="<?php echo $image_url; ?>" target="_blank" class="apod-video-link">Voir sur YouTube</a>
                    </div>
                <?php endif; ?>
            </div>

            <div class="apod-body">
                <h3 class="apod-title"><?php echo $image_title; ?></h3>
                <p class="apod-desc"><?php echo $image_desc; ?></p>
            </div>

            <div class="apod-footer">
    <span class="apod-source">Crédits : <span><?php echo $image_copy; ?></span></span>
    
    <?php 
        // On transforme la date YYYY-MM-DD en YYMMDD pour le lien NASA
        $link_date = date('ymd', strtotime($image_date));
        $final_link = "https://apod.nasa.gov/apod/ap" . $link_date . ".html";
    ?>
    
    <a href="<?php echo $final_link; ?>" target="_blank" class="apod-link">Consulter l'original</a>
</div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>