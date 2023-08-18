<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>LISTAS</title>
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
                <h2>Listas</h2>
            </div>
            <div class= actions>
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
                        <th>Nombre</th>
                        <th>Sipnosis</th>
                        <th>Foto</th>
                        <th>Capitulo</th>
                        <th>Fecha</th>
                        <th>Votos</th>
                        <th>Año</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody id="cuerpo"></tbody>
            </table>
        </section>
        <section id="insert_data">
            <div class="container">
                <form action="cons.php" method="POST" id="form">
                    <div class="row mt-5">
                        <div class="col-6 ">
                            <label for="#" class="form-label">Titulo</label>
                            <input type="text" class="form-control" name="titulo" id="titulo">
                        </div>
                        <div class="col-6">
                            <label for="#" class="form-label">Capitulos</label>
                            <input type="text" class="form-control" name="cap" id="cap">
                        </div>
                    </div>
                        <div class="col-12">
                            <label for="#" class="form-label">Sipnosis</label>
                            <input type="text" class="form-control" name="sipnosis" id="sipnosis">
                        </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <label for="#" class="form-label">Fecha de Insercion</label>
                            <input type="date" class="form-control" name="fecha" id="fecha">
                        </div>
                        <div class="col-6">
                            <label for="#" class="form-label">Votos</label>
                            <select name="votos" id="votos" class="form-control">
                                <option value="#">Seleciona tu opción</option>
                                <option value="1">1</option>
                                <option value="1.5">1.5</option>
                                <option value="2.0">2</option>
                                <option value="2.5">2.5</option>
                                <option value="3.0">3</option>
                                <option value="3.5">3.5</option>
                                <option value="4.0">4</option>
                                <option value="4.5">4.5</option>
                                <option value="5.0">5</option>
                            </select>
                        </div>
                    </div>
                        <div class="col-6 mb-3">
                            <label for="#" class="form-label">Año</label>
                            <select name="año" id="año" class="form-control">
                            <option value="" disabled selected>Selecciona tu opción</option>
                            <?php
                            for ($año = 1980; $año <= 2023; $año++) { 
                                echo "<option value='$año'>$año</option>";
                            }
                            ?>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <input type="file" name="photo" id= "photo">
                            <input type="text"name="avatar" id="avatar">
                        </div>
                        <div class="mb-3">
                            <img src="https://picsum.photos/300/200" class="iimmgg" id="avatarPreview">
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
    <script src="../../js/lista.js"></script>
    <script src="../../js/sidebar.js"></script>
    <script src="../../js/upload.js"></script>
</body>

</html>