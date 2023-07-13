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
  <header>
    <div class="header">
    <div class="logo">🚀Directorio de anime</div>
      <nav>
        <ul>
          <li><a href="index.php">Inicio</a></li>
          </ul>


        <div id="search">
         <form action= "directorio.php" method= "POST">
          <input type="text" placeholder="Buscar..." name="texto">  
          <input type="submit" name="search" value="🔍">
       </form>
      </div>
        <a href="usuarios/index.php" class="login">Login</a>
      </nav>
    </div>
</header>

  <section id="main">
<h1>Directorio de animes</h1>
<div class="episodes">
<?php
        require_once 'config/listas.php';
        $listas= new listas ("localhost","root","","anime_rocket");
        if (isset($_POST['search'])){
          $result = $listas ->search($_POST['texto']);
        } else {
            $result = $listas ->get_listas();
        }
         while ($row = $result ->fetch_array()) {
    ?>
        <div class="episode">
        <p class="icon">►</p>
        <img src="<?php echo $row ['thumbnail']; ?>" alt="">
        <div class="episode_description">
          <p class="episode_number">ANIME <?php echo $row ['id'];?></p>
          <h3 class="episode_title"><?php echo $row ['titulo'];?></h3>
        </div>
      </div>
    <?php
    }
    ?>
    </div>
  </section>

</body>
</html>