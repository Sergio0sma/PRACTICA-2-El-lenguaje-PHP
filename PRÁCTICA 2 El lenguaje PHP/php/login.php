<?php
    //php que gestiona el login del usuario
    session_start();
    if(!isset($_SESSION["user"])){ // Comprobar si la sesion esta iniciada con el usuario
        header("Location:../index.html");
    }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["user"], $_POST["password"])) {
                $user = $_POST["user"];
                $password = $_POST["password"];

                if ($user === "admin" && $password === "1234") {
                    $_SESSION["user"] = $user;
                    header("Location: ./agenda.php"); // Redirigir a la pagina de la agenda si el login es correcto
                    exit();
                } else {
                    echo "<p>Usuario o contraseña incorrectos.</p>";
                }
            }
        }
 

?>