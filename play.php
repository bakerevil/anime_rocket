<?php
require_once('playcarp/consulta_play.php');
$sipnosis = $modules->get_sipnosis();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="playcarp/css/styles_play.css">
    <title>Anime Rocket</title>
</head>
<body>
<?php require_once 'header.html'; ?>

    <main>
        <div class="anime-detalles">
            <div id="sinopsisCont">
                <h1><?php echo $sipnosis[0]; ?></h1>
            </div>
        </div>
        <section class="main-content">
            <div class="video-player">
                <video controls>
                    <source src="videos/videoplayback.mp4" type="video/mp4">
                </video>
            </div>
        </section>
        <section id="mainLE">

            <footer>
                <p>&copy; Anime Rocket 2023</p>
            </footer>
        </section>
    </main>
    
    <!-- <script src="playcarp/play.js"></script>  -->
</body>
</html>