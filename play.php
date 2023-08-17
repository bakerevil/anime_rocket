<?php
require_once('playcarp/consulta_play.php');
$sipnosis = $modules->get_sipnosis();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anime Rocket</title>
    <link rel="stylesheet" href="playcarp/css/styles_play.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="#" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Directorio Anime</a></li>
            </ul>
        </nav>
    </header>

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
