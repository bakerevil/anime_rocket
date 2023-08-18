<?php
require_once('play_directorio/consulta.php');
$sipnosis = $modules->get_sipnosis();
$titulo = $modules->get_nombre();
$categorias = $modules->get_categoria();
$tipos = $modules->get_tipo();
$votos = $modules->get_votos();
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="css/stiles.css">
  <title>🚀 Anime Rocket</title>
</head>
<body>
    <?php
    require_once 'header.html';
    ?>
  <div class="titulo">
    <div class="nombrett" id="nombrecont">
      <p><?php echo $titulo[0]; ?></p>
      <a class="tipoanime"><?php echo $tipos[0]; ?></a>
      <h3>categorias</h3>
      <p><?php echo $categorias[0]; ?></p>
    </div>
      <div class="voto">
        <i class="fa-solid fa-star"></i>
        <p><?php echo $votos[0]; ?> de calificaion</p>
      </div>
  </div>
  <br>
  <div class="img"><img src="public/asria.png" alt="">
  <div class="sinopsis" id="sinopsisConte">
    <h2>Sinopsis</h2>
    <br>
      <p><?php echo $sipnosis[0]; ?></p>
  </div>
</div>
  <div class="redes">
    <!-- aqui van las imagenes del facebook y twiiter  -->
    <div class="red1"><img src="#" alt=""></div>
    <div class="red2"><img src="#" alt=""></div>
  </div>
  <script src="js/index.js"></script>
</body>
</html>