<?php
require_once('valid.php');

$validation = new Admin("localhost", "root", "", "anime_rocket");
$result = $validation->validation($_POST['correo'], $_POST['passwords']);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_role = $row['rol'];

    session_start();

    // Redirecciona automáticamente según el rol
    if ($user_role === '1') {
        header("location: ../admin/modules/usuarios/index.html");
    } elseif ($user_role === '0') {
        header("location:../../ANIME_ROCKET/index.php");
    } else {
        header("location: ANIME_ROCKET/admin/inicio.php");
    }
} else {
    header("location: ../admin/inicio.php");
}
?>
