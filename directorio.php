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
<form id="filter" action="directorio.php" method="POST">
  
  <?php
  require_once 'config/filter.php';
  $filter = new filter("localhost", "root", "", "anime_rocket");
  $result = $filter->get_tipo();

  echo '<label for="tipo"></label>';
  echo '<select id="tipo" name="select">';
  echo '<option value="#">Tipo</option>';

  while ($row = $result->fetch_array()) {
    echo '<option value="' . $row['rvt_nombre'] . '">' . $row['rvt_nombre'] . '</option>';
  }

  echo '</select>';
  ?>

<?php
  require_once 'config/filter.php';
  $filter = new filter("localhost", "root", "", "anime_rocket");
  $result = $filter->get_categoria();

  echo '<label for="categorias"></label>';
  echo '<select id="categorias" name="select">';
  echo '<option value="#">Categoria</option>';

  while ($row = $result->fetch_array()) {
    echo '<option value="' . $row['categoria'] . '">' . $row['categoria'] . '</option>';
  }

  echo '</select>';
  ?>

<?php
  require_once 'config/filter.php';
  $filter = new filter("localhost", "root", "", "anime_rocket");
  $result = $filter->get_status();

  echo '<label for="status"></label>';
  echo '<select id="status" name="select">';
  echo '<option value="#">Status</option>';

  while ($row = $result->fetch_array()) {
    echo '<option value="' . $row['status'] . '">' . $row['status'] . '</option>';
  }

  echo '</select>';
  ?>

  <button type="submit" name="filter" value="">Filtrar🔎</button>
</form>

<div class="episodes">

<?php
require_once 'config/filter.php';
require_once 'config/listas.php';

$filter = new filter("localhost", "root", "", "anime_rocket");
$listas = new listas("localhost", "root", "", "anime_rocket");

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
      <div class="episode">
        <p class="icon">►</p>
        <img src="public/<?php echo $row ['thumbnail']; ?>" alt="">
        <div class="episode_description">
        <h3 class="episode_lis"><?php echo $row['status'];?></h3>
          <p class="episode_number">Anime <?php echo $row ['id'];?></p>
          <h3 class="episode_title"><?php echo $row ['titulo'];?></h3>
          <div class="sipnosis">
              <p><?php echo $row['sipnosis']; ?></p>
          </div>
        </div>
      </div>
            <?php
      } else {
        // No hagas nada o muestra un mensaje de ocultación si deseas
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
      <a href="play.php?id=<?php echo $row['id']; ?>">
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
  } else {
      // No hagas nada o muestra un mensaje de ocultación si deseas
  }
}
}
?>
    </div>
  </section>

</body>
</html>