<?php
require_once('play_directorio/consulta.php');
$sipnosis = $modules->get_sipnosis();
$titulo = $modules->get_nombre();
$categorias = $modules->get_categoria();
$tipos = $modules->get_tipo();
$votos = $modules->get_votos();
$thumbnail = $modules->get_thumbnail();
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
      <div id="tip">
        <p><?php echo $tipos[0]; ?> </p>
      </div>
    </div>
    <div>
      
    </div>
    <div class="cat" id="catego">
      <h3>categorias</h3>
      <p><?php echo $categorias[0]; ?></p>
    </div>
      <div class="voto">
        <i class="fa-solid fa-star"></i>
        <p><?php echo $votos[0]; ?> de calificaion</p>
      </div>
  </div>
  <br>
  <div class="img">
    <img src="public/<?php echo $thumbnail[0]; ?>" alt="">
    <div class="sinopsis" id="sinopsisConte">
      <h2>Sinopsis</h2>
      <br>
      <p><?php echo $sipnosis[0]; ?></p>
    </div>
  </div>
  <section id="mainLE">
    <h2>Lista de Episodios</h2>
    <div class="episodess">
      <?php
        require_once 'config/episodios.php';
        $episodios = new episodios("localhost", "root", "", "anime_rocket");
        
        $anime = $_GET['id'] ?? 0;
        $cap = $episodios->get_episodios();
        foreach ($cap as $key => $value) {
        if ($value['anime'] == $anime) {
      ?>
      <div class="episode">
      <a href="play.php?id=<?php echo $value['id'];?>"<?php echo $value["capitulo"];?>">
          <p class="icon">►</p>
          <img src="<?php echo $value['thumbnail']; ?>" alt="">
          <div class="episode_description">
            <p class="episode_number"><?php echo 'capitulo ' . $value['orden']; ?></p>
            <h3 class="episode_title"><?php echo $value['capitulo']; ?></h3>
          </div>
        </a>
      </div>
    <?php
    }
  }
  ?>
    </div>
  </section>
  <!-- <script src="js/index.js"></script> -->
</body>
</html>