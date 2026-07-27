<?php
$images = glob("images/*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Image Gallery</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background: #f5f5f5;
    padding: 30px;
}

h1 {
    text-align: center;
    margin-bottom: 30px;
    color: #333;
}

.gallery {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
}

.gallery-item {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,.1);
    transition: transform .3s ease;
}

.gallery-item:hover {
    transform: translateY(-5px);
}

.gallery-item img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    display: block;
}

.image-name {
    padding: 15px;
    text-align: center;
    color: #555;
    font-size: 14px;
}

.lightbox {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,.9);
    justify-content: center;
    align-items: center;
}

.lightbox img {
    max-width: 90%;
    max-height: 90%;
}

.lightbox.active {
    display: flex;
}

.close-btn {
    position: absolute;
    top: 20px;
    right: 30px;
    color: white;
    font-size: 40px;
    cursor: pointer;
}
</style>

</head>
<body>

<h1>My Image Gallery</h1>

<div class="gallery">
    <?php foreach ($images as $image): ?>
        <div class="gallery-item">
            image ?>" onclick="openLightbox('<?= $image ?>')">
            <div class="image-name">
                <?= basename($image) ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div id="lightbox" class="lightbox" onclick="closeLightbox()">
    <span class="close-btn">&times;</span>
    
</div>

<script>
function openLightbox(src) {
    document.getElementById("lightbox-img").src = src;
    document.getElementById("lightbox").classList.add("active");
}

function closeLightbox() {
    document.getElementById("lightbox").classList.remove("active");
}
</script>

</body>
</html>