<?php

    if(!isset($_SESSION["user"])){ // Comprobar si la sesion esta iniciada con el usuario
        header("Location:../index.html");
        
    }
    if (!isset($_SESSION["agenda"])) {
        $_SESSION["agenda"] = [];
    }

    // Si llega un POST, añadimos una nueva persona
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST["name"]) && isset($_POST["local"]) && isset($_POST["phone"])) {
            if($_POST["local"]=="" && $_POST["phone"]==""){
                            // Eliminar de la agenda
            var_dump($_POST["local"]);
            $nombreAEliminar = $_POST["name"];
            foreach ($_SESSION["agenda"] as $key => $contacto) {
                if ($contacto["Nombre"] == $nombreAEliminar) {
                    unset($_SESSION["agenda"][$key]);
                    break; // para salir del bucle una vez encontrado el primero
                }
            }
            // Reindexar el array para evitar huecos
            $_SESSION["agenda"] = array_values($_SESSION["agenda"]);
            header("Location: ./agenda.php");
            }elseif(array_search($_POST["name"], array_column($_SESSION["agenda"], 'Nombre')) !== false){ //buscar si el nombre ya existe en la agenda
                // informacion sacada de:
                // https://www.php.net/manual/es/function.array-search.php
                // https://www.php.net/manual/en/function.array-column.php
                //Si existe el nombre en la agenda, actualizar los datos
                $nombreAActualizar = $_POST["name"];
                foreach ($_SESSION["agenda"] as $key => $contacto) {
                    if ($contacto["Nombre"] == $nombreAActualizar) {
                        $_SESSION["agenda"][$key]["Localidad"] = $_POST["local"];
                        $_SESSION["agenda"][$key]["Telefono"] = $_POST["phone"];
                        break; // para salir del bucle una vez encontrado el primero
                    }
                }
                // Redirigir para evitar reenvio de formulario
                header("Location: ./agenda.php");

            }else{
                // Recoger datos del formulario
                $persona = [
                    "Nombre"    => $_POST["name"],
                    "Localidad" => $_POST["local"],
                    "Telefono"  => $_POST["phone"]
                ];           
                $_SESSION["agenda"][] = $persona;
                // Redirigir para evitar reenvio de formulario
                header("Location: ./agenda.php"); 
            }

        }  
        }
?>