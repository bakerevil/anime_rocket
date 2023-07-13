
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="../css/estilo.css">

</head>
<body class="text-center">
    <main class="form-signin">
        <form action="../config/login.php" method="POST">
      <h1>Denxy</h1>
      <h2 class="h3 mb-3 font-weight-normal">Porfavor iniciar sesion</h1>
      <label for="inputcorreo" class="sr-only">correo electronico</label>
      <input type="correo" id="inputcorreo" class="form-control" placeholder="correo"  name="correo">
      <label for="inputpasswords" class="sr-only">Password</label>
      <input type="passwords" id="inputpasswords" class="form-control" placeholder="passwords" name="passwords">
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">iniciar sesion</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2022</p>
      <div>
        <a href="form-insert.php">No tienes cuenta has click aqui</a>
      <div>
        <a href="recovery.php">¿olvidaste tu contraseña?</a>
      </div>
    </form>
    </main>
  </body>
</html>