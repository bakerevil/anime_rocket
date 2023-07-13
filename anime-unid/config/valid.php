<?php
    $validation = new Admin("localhost","root","","anime_rocket");
    $result = $validation -> validation($_POST['correo'],$_POST['passwords']);
        if (mysqli_num_rows($result) > 0 ) {
            session_start();
            header("location: ../admin/modules/usuarios/index.html");
        } else{
            header("location: ../admin/inicio.php");
        }
?>