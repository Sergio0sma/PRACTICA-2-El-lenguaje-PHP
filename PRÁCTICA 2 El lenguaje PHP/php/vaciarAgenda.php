<?php

    if(!isset($_SESSION["user"])){ // Comprobar si la sesion esta iniciada con el usuario
        header("Location:../index.html");
    }
    if(isset($_SESSION["agenda"]) && count($_SESSION["agenda"]) > 0){ // Comprobar si la agenda tiene contactos
        echo '
            <fieldset style="width:300px; margin: 0 auto;">
                <legend>Vaciar agenda</legend>
                <form action="#" method="GET">
                    <input type="hidden" name="vaciar" value="true">
                    <input type="submit" value="Vaciar" id="vaciar">
                </form>
            </fieldset>'; // Formulario para vaciar la agenda
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET["vaciar"])) {
                // Vaciar la agenda
                unset($_SESSION["agenda"]);
                // Redirigir para evitar reenvio de formulario
                header("Location: ./agenda.php");
            }
        }
    }
?>