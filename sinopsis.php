<!DOCTYPE html>
<html lang="es-MX">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/stiles.css">
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

    $categorias = new categorias("localhost", "root", "", "anime_rocket");
    $categories = $categorias->get_data();
    foreach ($categories as $key => $value) {
    ?>
      <li><a class="catego" href="categorias.php?id=<?php echo $value['id']; ?>"><?php echo $value["categoria"]; ?></a></li>
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
          <form action="index.php" method="POST">
            <input type="text" placeholder="Buscar..." name="texto">
            <input type="submit" name="search" class="lup" value="🔍">
          </form>
        </div>
        <a href="admin/" class="login">Login</a>
      </nav>
    </div>
  </header>


  <div class="container" >
      <div class="nombre">
        <div class="titulo">
          <div class="nombrett">
            <h1>Baki Hanmaa <a class="tipoanime"> Ova </a></h1>
  
          </div>
         
          <div class="titulos">
            <div class="titulo1">
              <h3>The boy fascining</h3>
            </div>
            <div class="titulo2">
              <h3>golpes</h3>
            </div>
            <div class="titulo3">
              <h3>Hanma</h3>
            </div>
          </div>
        </div>
    </div>




    </div>
    <div class="img"><img src="#" alt="">

    </div>
    <div class="sinopsis">
      <h2>Sinopsis</h2>
      <div>

      </div>
      <div class="categorias">
        <h3>Artes marciales</h3>
      </div>
      <div class="descripcion">
        <h3>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo reprehenderit odio repellendus placeat laboriosam neque, nam nesciunt inventore voluptatibus dolor similique laudantium, amet ad fuga atque unde pariatur magni id.</h3>
      </div>
    </div>
    <div class="votacion">
      <div class="puntuacion"><img src="#" alt="">

      </div>
      <div class="redes">

        <!-- aqui van las imagenes del facebook y twiiter  -->
        <div class="red1"><img src="#" alt=""></div>
        <div class="red2"><img src="#" alt=""></div>
      </div>
    </div>


  </div>



  <script src="js/index.js"></script>
</body>

</html>