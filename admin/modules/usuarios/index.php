<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>USUARIOS</title>
</head>

<body>
    <div id="sideBarContainer">
        <?php require_once '../../inside.html'; ?>
    </div>
    <main id="main" class="main">
        <div class="header">
        <div class="left">
                <div value="Rotate" id="img_container">
                    <a href="javascript:void(0)" onclick="showHideSideBar()">
                        <i class="fa-sharp fa-solid fa-chevron-left" id="image"></i>
                    </a>
                </div>
                <h2>Usuarios</h2>
            </div>
            <div class=actions>
                <a href="#" class="btnaction" id="refresh"><i class="fa-solid fa-rotate-right"></i> Regresar</a>
                <a href="#" class="btnaction" id="btnNew"><i class="fa-solid fa-plus"></i> Nuevo</a>
                <a href="#" class="btnaction" id="btnBorrar"><i class="fa-solid fa-trash"></i> Borrar</a>
            </div>
        </div>
        <section id="data">
            <table>
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" id="SelectAll">
                        </th>
                        <th> Correo</th>
                        <th> Nombre</th>
                        <th> Rol</th>
                        <th> Status</th>
                        <th> avatar</th>
                        <th> Editar</th>
                    </tr>
                </thead>
                <tbody id="cuerpo"></tbody>
            </table>
        </section>
        <section id="insert_data">
            <div class="container">
                <form action="consulta.php" method="POST" id="form">
                    <div class="row mt-5">
                        <div class="col-6">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control" name="correo" id="correo">
                        </div>
                        <div class="col-6">
                            <label for="passwords" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="passwords" id="passwords">
                        </div>
                        <div class="col-6">
                            <label for="rol" class="form-label">Rol</label>
                            <select name="rol" class="form-control" id="rol"></select>
                        </div>
                        <div class="col-6">
                            <label for="status" class="form-label">Status</label>
                            <select name="statuses" id="statuses" class="form-control">
                                <option value="0">Inactivo</option>
                                <option value="1">Activo</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="nombre" class="form-label">Usuario</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                        <div class="col-12 mb-3">
                            <input type="file" name="photo" id= "photo">
                            <input type="hidden"name="avatar" id="avatar">
                        </div>
                        <div>
                            <img src="https://picsum.photos/300/200" id="avatarPreview">
                            </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success" id="btnSave">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script src="../../js/profile.js"></script>
    <script src="../../js/tabla.js"></script>
    <script src="../../js/sidebar.js"></script>
    <script src="../../js/upload.js"></script>
</body>

</html>