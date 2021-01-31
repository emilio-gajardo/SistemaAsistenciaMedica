<?php
require_once("../Modelo/Enfermera.php");

if (isset($_POST["rut"]) && $_POST["rut"] != "") {
    $rut = $_POST["rut"];
}

if (isset($_POST["nombre"]) && $_POST["nombre"] != "") {
    $nombre = $_POST["nombre"];
}

if (isset($_POST["apel"]) && $_POST["apel"] != "") {
    $apel = $_POST["apel"];
}

if (isset($_POST["valor"]) && $_POST["valor"] != "") {
    $valor = $_POST["valor"];
}

// AGREGAR
if (isset($_POST["OK"]) && $_POST["OK"] == "Ingresar") {
    
    $enfermera = new Enfermera();
    $enfermera->Enfermera($rut, $nombre, $apel, $valor);
    $result = $enfermera->agregarEnfermera();

    if ($result != "") {
        header("Location:../Vision/GuiEnfermera.php");
    } else {
        echo "<script languaje='javacript'>alert('Error de transaccion');
             windows.location='../Vision/GuiEnfermera.php'</script>";
    }
}

// EDITAR
if (isset($_POST["OK1"]) && $_POST["OK1"] == "Modificar") {
    
    $enfermera = new Enfermera();
    $enfermera->Enfermera($rut, $nombre, $apel, $valor);
    $result = $enfermera->editarEnfermera();

    if ($result != "") {
        header("Location:../Vision/GuiEnfermera.php");
    } else {
        echo "<script languaje='javacript'>alert('Error de transaccion');
             windows.location='../Vision/GuiEnfermera.php'</script>";
    }
}

// ELIMINAR
if (isset($_POST["OK2"]) && $_POST["OK2"] == "Eliminar") {
    
    $enfermera = new Enfermera();
    $enfermera->setRut($rut);
    $result = $enfermera->eliminarEnfermera();

    if ($result != "") {
        header("Location:../Vision/GuiEnfermera.php");
    } else {
        echo "<script languaje='javacript'>alert('Error de transaccion');
             windows.location='../Vision/GuiEnfermera.php'</script>";
    }
}
