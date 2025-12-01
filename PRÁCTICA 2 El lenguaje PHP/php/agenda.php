<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda telefonos</title>
</head>
<body style="background-color: orange; text-align:center">
    <?php
        session_start();
        if(!isset($_SESSION["user"])){ // Comprobar si la sesion esta iniciada con el usuario
            header("Location:../index.html");
        }
    ?>
    <h1>Agenda</h1>
    <div class="datosAgenda">
        <?php
            include "./datosAgenda.php";
            echo "<br>";
        ?>
    </div>
    <div >
        <fieldset style="width:300px; margin: 0 auto;">
            <legend>Nuevo contacto</legend>
            <form action="#" method="POST">
                <label for="name">Nombre: </label>
                <input type="text" name="name" id="name" required>
                <br>
                <label for="local">Localidad: </label>
                <input type="text" name="local" id="local">
                <br>
                <label for="phone">Telefono: </label>
                <input type="tel" name="phone" id="phone" pattern="[6-7]\d{8}$">
                <br>
                <br>
                <input type="submit" value="Añadir contacto" id="enviar">
                <input type="reset" value="Limpiar campo" id="reset">
            </form>
                <?php
                    include "./añadir.php";
                ?>
        </fieldset>
    </div>
    <div class="vaciarAgenda">
        <?php
            include "./vaciarAgenda.php";
        ?>
    </div>
        <div class="cerrarSesion">
            <br>
        <form action="./cerrarSesion.php" method="POST">
            <input type="submit" value="cerrar Sesion" id="cerrarSesion">
        </form>
        <?php
            include "./cerrarSesion.php";
        ?>
        </div>

</body>
</html>