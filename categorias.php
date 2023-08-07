
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
    <a href="#" id="closesidebar"> cerrar</a>
    <h2>categorias</h2>
    
    <ul>
    <?php
    
    require_once 'config/categorias.php';

    $categorias= new categorias("localhost","root","","anime_rocket");
    $categories = $categorias->get_data();
    foreach ($categories as $key => $value) {
      ?>
        <li><a href="categorias.php?id=<?php echo $value['id'];?>"><?php echo $value["categoria"];?></a></li>
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
          <li><a href="index.php">Inicio</a></li>
          <li><a href="directorio.php">Directorio Anime</a></li>
        </ul>
        <div id="search">
         <form action= "index.php" method= "POST">
          <input type="text" placeholder="Buscar..." name="texto">  
          <input type="submit" name="search" value="🔍">
       </form>
      </div>
        <a href="admin/index.html" class="login">Login</a>
      </nav>
    </div>
  </header>


<section id="main">

  <h1 href="categorias.php?id=<?php echo $value['id'];?>"><?php echo $value["categoria"];?></h1>
  <div class="episodes">


  <?php
require_once 'config/categorias.php';

$categorias = new categorias("localhost", "root", "", "anime_rocket");

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $categories = $categorias->get_data($category_id);
} else {
    $categories = $categorias->get_categoria();
}

foreach ($categories as $key => $value) {
?>

<div class="episode">
    <p class="icon">►</p>
    <img src="<?php echo $value['thumbnail']; ?>" alt="">
    <div class="episode_description">
        <p class="episode_number"><?php echo 'Episodio ' . $value['id']; ?></p>
        <h3 class="episode_title"><?php echo $value['capitulo']; ?></h3>
    </div>
</div>

<?php
}
?>
</section>


  <script src="js/index.js"></script>
</body>

</html>