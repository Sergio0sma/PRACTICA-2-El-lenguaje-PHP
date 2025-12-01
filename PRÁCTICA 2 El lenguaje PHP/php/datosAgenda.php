<?php
    // php que muestra los datos de la agenda
    if(!isset($_SESSION["user"])){ // Comprobar si la sesion esta iniciada con el usuario
        header("Location:../index.html");
    }

    if (isset($_SESSION["agenda"]) && count($_SESSION["agenda"]) > 0) {
        echo '
        <fieldset style="width:300px; margin: 0 auto;">
            <legend>Datos agenda</legend>
                <table border="0" style="margin: 0 auto;">
                    <tr>
                        <th>Nombre</th>
                        <th>Localidad</th>
                        <th>Telefono</th>
                    </tr>';

        foreach ($_SESSION["agenda"] as $persona) { // Recorrer los contactos de la agenda
            echo "<tr>";
            echo "<td>" . $persona["Nombre"] . "</td>";
            echo "<td>" . $persona["Localidad"] . "</td>";
            echo "<td>" . $persona["Telefono"] . "</td>";
            echo "</tr>";
        }
        echo '</table>
        </fieldset>';
    } else {
        echo "<p>No hay contactos en la agenda.</p>";
    }
?>