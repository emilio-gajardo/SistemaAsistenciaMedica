<?php

require_once("../Modelo/Familiar.php");

if (isset($_POST["rut"]) && $_POST["rut"] != "") {
    $rut = $_POST["rut"];
}

if (isset($_POST["rutpaciente"]) && $_POST["rutpaciente"] != "") {
    $rutpaciente = $_POST["rutpaciente"];
}

if (isset($_POST["nombre"]) && $_POST["nombre"] != "") {
    $nombre = $_POST["nombre"];
}

if (isset($_POST["apel"]) && $_POST["apel"] != "") {
    $apel = $_POST["apel"];
}

if (isset($_POST["fono"]) && $_POST["fono"] != "") {
    $fono = $_POST["fono"];
}

if (isset($_POST["email"]) && $_POST["email"] != "") {
    $email = $_POST["email"];
}

if (isset($_POST["tipo"]) && $_POST["tipo"] != "") {
    $tipo = $_POST["tipo"];
}



// AGREGAR
if (isset($_POST["OK"]) && $_POST["OK"] == "Ingresar") {

    $familiar = new Familiar();
    $familiar->Familiar($rut, $rutpaciente, $nombre, $apel, $fono, $email, $tipo);
    $result = $familiar->agregarFamiliar();

    if ($result != "") {
        header("Location:../Vision/GuiFamiliar.php");
    } else {
        echo "<script languaje='javacript'>alert('Error de transaccion');
             windows.location='../Vision/GuiFamiliar.php'</script>";
    }
}

// EDITAR
if (isset($_POST["OK1"]) && $_POST["OK1"] == "Modificar") {

    $familiar = new Familiar();
    $familiar->Familiar($rut, $rutpaciente, $nombre, $apel, $fono, $email, $tipo);
    $result = $familiar->editarFamiliar();

    if ($result != "") {
        header("Location:../Vision/GuiFamiliar.php");
    } else {
        echo "<script languaje='javacript'>alert('Error de transaccion');
             windows.location='../Vision/GuiFamiliar.php'</script>";
    }
}

// ELIMINAR
if (isset($_POST["OK2"]) && $_POST["OK2"] == "Eliminar") {

    $familiar = new Familiar();
    $familiar->setRut($rut);
    $result = $familiar->eliminarFamiliar();

    if ($result != "") {
        header("Location:../Vision/GuiFamiliar.php");
    } else {
        echo "<script languaje='javacript'>alert('Error de transaccion');
             windows.location='../Vision/GuiFamiliar.php'</script>";
    }
}
