
<!DOCTYPE html>
<html lang="es-MX">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css">
                  <title>🚀 Anime Rocket</title>
</head>
<body>
  <div id="sidebar">
    <a href="#" id="closesidebar"> Cerrar</a>
    <br>
    <br>
    <br>
    <div class="logo">
        🚀 
    </div>
    <h2 class="categ">Categorias</h2>
    
          
    
    
    <?php
    
    require_once 'config/categorias.php';

    $categorias= new categorias("localhost","root","","anime_rocket");
    $categories = $categorias->get_data();
    foreach ($categories as $key => $value) {
      ?>
        <li><a class="catego" href="categorias.php?id=<?php echo $value['id'];?>"><?php echo $value["categoria"];?></a></li>
      <?php
    }
    ?>
    
   

    
    </ul>

  </div>
  <header>
    <div class="header">
    <div class="logo"><a href="#" id="togglesidebar">🚀</a>Anime Rocket</div>
      <nav>
        <ul>
          <li><a href="index" class="inici">Inicio</a></li>
          <li><a href="directorio" class="directo">Directorio Anime</a></li>
        </ul>
        <div id="search">
         <form action= "index.php" method= "POST">
          <input type="text" placeholder="Buscar..." name="texto">  
          <input type="submit" name="search" class="lup" value="🔍">
       </form>
      </div>
        <a href="admin/" class="login">Login</a>
      </nav>
    </div>
  </header>

  <section id="main">
    <h2>Últimos Episodios</h2>
    <div class="episodes">

    <?php
        require_once 'config/videos.php';

        require_once 'config/listas.php';

        $videos= new videos("localhost","root","","anime_rocket");
        if (isset($_POST['search'])){
          $result = $videos ->search($_POST['texto']);
        } else {
            $result = $videos ->get_videos();
        }

        while ($row = $result ->fetch_array()) {
    ?>

      <div class="episode">
        <p class="icon">►</p>
        <img src="<?php echo $row ['thumbnail']; ?>" alt="">
        <div class="episode_description">
        <h3 class="episode_cat"><?php echo $row['categoria']  ?></h3>
          <p class="episode_number">Episodio <?php echo $row ['id'];?></p>
          <h3 class="episode_title"><?php echo $row ['capitulo'];?></h3>
        </div>
      </div>

    <?php
    }
    ?>

    </div>
</section>
<section id="main">
<h1>Ultimos animes agregados</h1>
<div class="episodes">
<?php
        $listas= new listas ("localhost","root","","anime_rocket");
        if (isset($_POST['search'])){
          $result = $listas ->get_listas($_POST['texto']);
        } else {
            $result = $listas ->get_listas();
        }
        while ($row = $result ->fetch_array()) {
    ?>
      <div class="episode">
        <p class="icon">►</p>
        <img src="<?php echo $row ['thumbnail']; ?>" alt="">
        <div class="episode_description">
        <h3 class="episode_lis"><?php echo $row['status'];?></h3>
          <p class="episode_number">Anime <?php echo $row ['id'];?></p>
          <h3 class="episode_title"><?php echo $row ['titulo'];?></h3>
        </div>
      </div>

    <?php
    }
    ?>

    </div>
  </section>
  <script src="js/index.js"></script>
</body>

</html>