<?php
if(!isset($_SESSION["user"])){ // Comprobar si la sesion esta iniciada con el usuario
    header("Location:../index.html");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["cerrarSesion"]))
    {
        session_unset(); // Eliminar todas las variables de sesion
        session_destroy(); // Destruir la sesion
        header("Location: ../index.html"); // Redirigir al inicio de sesion
    }
}
?>