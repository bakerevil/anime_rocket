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
        <section class="main-content">
            <div class="video-player">
                <video controls>
                    <source src="#" type="video/mp4">
                    Tu navegador no soporta el formato de video.
                </video>
            </div>
            <div class="anime-detalles">
                <h1>Nombre del Anime</h1>
                <br>
                <div id="sinopsisCont">
                    <p><?php echo $sipnosis[0]; ?></p>
                </div>
            </div>
        </section>

        <section class="episodes-list">
            <h2>Lista de Episodios</h2>
            <ul>
                <!-- Aqui debo poner la lista de episodios -->
            </ul>
        </section>
        
    </main>
    
    <footer>
        <p>&copy; Anime Rocket 2023</p>
    </footer>
    
    <!-- <script src="playcarp/play.js"></script>  -->
</body>
</html>
