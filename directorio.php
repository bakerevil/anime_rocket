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
  <?php require_once 'header.html'; ?>
  <section id="main">
    <h1>Directorio De Animes</h1>
    <div id="filter">
      <form id="filter" action="directorio.php" method="POST"> 
        <?php
        require_once 'config/filter.php';
        require_once 'config/listas.php';

        $filter = new filter("localhost", "root", "", "anime_rocket");
        $listas = new listas("localhost", "root", "", "anime_rocket");

        $result = $filter->get_tipo();
        echo '<label for="tipo" class="form-label"></label>';
        echo '<select id="tipo" class="form-control" name="select">';
        echo '<option value="#">Tipo</option>';
        while ($row = $result->fetch_array()) {
          echo '<option value="' . $row['rvt_nombre'] . '">' . $row['rvt_nombre'] . '</option>';
        }
        echo '</select>';
        $result = $filter->get_categoria();
        echo '<label for="categorias" class="form-label"></label>';
        echo '<select id="categorias" class="form-control" name="select">';
        echo '<option value="#">Categoria</option>';
        while ($row = $result->fetch_array()) {
          echo '<option value="' . $row['categoria'] . '">' . $row['categoria'] . '</option>';
        }
        echo '</select>';
        
        
        $result = $filter->get_status();
        echo '<label for="status" class="form-label"></label>';
        echo '<select id="status" class="form-control" name="select">';
        echo '<option value="#">Status</option>';
        while ($row = $result->fetch_array()) {
          echo '<option value="' . $row['status'] . '">' . $row['status'] . '</option>';
        }
        echo '</select>';
        ?>
        <button type="submit" name="filter" value="">Filtrar</button>
      </form>
    </div>
    <div class="episodes">
        <?php
        // Verificar si se realiza una búsqueda en el filtro
        if (isset($_POST['filter'])) {
          $resultfilter = $filter->get_listas($_POST['select']);
        }
        // Verificar si se realiza una búsqueda en la lista
        if (isset($_POST['search'])) {
          // Obtén los resultados de la lista solo si no se realizó una búsqueda en el filtro
          if (!isset($resultfilter)) {
            $resultlistas = $listas->get_listas($_POST['texto']);
          }
        } elseif (!isset($resultfilter)) {
          // Obtén los resultados de la lista si no se realizó ninguna búsqueda en el filtro
          $resultlistas = $listas->get_listas();
        }
        // Mostrar resultados del filtro si están disponibles
        if (isset($resultfilter)) {
          while ($row = $resultfilter->fetch_array()) {
            $shouldShowfilter = true; // Cambiar esto basado en tu lógica de ocultar/mostrar
            $dontShowfilter = false;
              if ($shouldShowfilter && ! $dontShowfilter) {
                // Muestra información del filtro
        ?>
        <a href="sinopsis.php?id=<?php echo $row['id']; ?>">
          <div title="<?php echo $row['sipnosis']; ?>">
            <p class="icon">►</p>
            <img src="public/<?php echo $row['thumbnail']; ?>" alt="">
            <div class="episode_description">
              <h3 class="episode_lis"><?php echo $row['status']; ?></h3>
              <p class="episode_number">Anime <?php echo $row['id']; ?></p>
              <h3 class="episode_title"><?php echo $row['titulo']; ?></h3>
            </div>
          </div>
        </a>
      </div>
      <?php
      } 
    }
  }
// Mostrar resultados de la lista si están disponibles
if (isset($resultlistas)) {
while ($row = $resultlistas->fetch_array()) {
  $shouldShowlistas = true; // Cambiar esto basado en tu lógica de ocultar/mostrar
  $dontshowlistas = false;

  if ($shouldShowlistas && !$dontshowlistas) {
      // Muestra información de la lista
      ?>
      <div class="episode">
        <a href="sinopsis.php?id=<?php echo $row['id']; ?>">
          <div title="<?php echo $row['sipnosis']; ?>">
            <p class="icon">►</p>
            <img src="public/<?php echo $row['thumbnail']; ?>" alt="">
            <div class="episode_description">
              <h3 class="episode_lis"><?php echo $row['status']; ?></h3>
              <p class="episode_number">Anime <?php echo $row['id']; ?></p>
              <h3 class="episode_title"><?php echo $row['titulo']; ?></h3>
            </div>
          </div>
        </a>
      </div>
      <?php
    } 
  }
}
?>
    </div>
  </section>
</body>
</html>