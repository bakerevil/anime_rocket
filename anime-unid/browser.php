<!DOCTYPE html>
<html lang="es-MX">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css">
  <title>🚀 AnimeRocket</title>
</head>

<body>
  <header>
    <div class="header">
      <div class="logo">🚀 AnimeRocket</div>
      <nav>
        <ul>
          <li><a href="index.php">Inicio</a></li>
        </ul>
        <div id="search">
          <form action="browser.php" method="POST">
            <input type="text" placeholder="Buscar..." name="texto">
            <input type="submit" name="search" value="🔍">
          </form>
        </div>
        <a href="admin/index.php" class="login">✔ Login</a>
      </nav>
    </div>
  </header>
  <section id="main">
    <h2>Todos los Animes</h2>
    <div class="episodes">
      <?php
      require_once 'config/todos.php';
      $todos= new todos("localhost","root","","anime_rocket");
        if (isset($_POST['search'])) {
          $result3 = $todos->search($_POST['texto']);
        } else {
          $result3 = $todos ->get_todos();
        }
        while ($row3 = $result3-> fetch_array()) {        
      ?>
        <div class="episode">
            <img src="<?php echo $row3['thumbnail'] ?>" alt="">
            <p class="icon">►</p>
          <div class="episode_description">
            <p class="episode_number">Episodio <?php echo $row3['orden'];?></p>
            <h3 class="episode_title"><?php echo $row3['titulo']  ?></h3>
          </div>
        </div>
        <?php
          }
        ?>
    </div>
