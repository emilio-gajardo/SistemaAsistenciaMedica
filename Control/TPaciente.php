<?php

require_once("../Modelo/Paciente.php");

if (isset($_POST["rut"]) && $_POST["rut"] != "") {
    $rut = $_POST["rut"];
}

if (isset($_POST["nombre"]) && $_POST["nombre"] != "") {
    $nombre = $_POST["nombre"];
}

if (isset($_POST["apel"]) && $_POST["apel"] != "") {
    $apel = $_POST["apel"];
}

if (isset($_POST["edad"]) && $_POST["edad"] != "") {
    $edad = $_POST["edad"];
}

if (isset($_POST["medicamento"]) && $_POST["medicamento"] != "") {
    $medicamento = $_POST["medicamento"];
}

if (isset($_POST["enfermedad"]) && $_POST["enfermedad"] != "") {
    $enfermedad = $_POST["enfermedad"];
}

// AGREGAR
if (isset($_POST["OK"]) && $_POST["OK"] == "Ingresar") {

    $paciente = new Paciente();
    $paciente->Paciente($rut, $nombre, $apel, $edad, $medicamento, $enfermedad);
    $result = $paciente->agregarPaciente();

    if ($result != "") {
        header("Location:../Vision/GuiPaciente.php");
    } else {
        echo "<script languaje='javacript'>alert('Error de transaccion');
             windows.location='../Vision/GuiPaciente.php'</script>";
    }
}

// EDITAR
if (isset($_POST["OK1"]) && $_POST["OK1"] == "Modificar") {
    
    $paciente = new Paciente();
    $paciente->Paciente($rut, $nombre, $apel, $edad, $medicamento, $enfermedad);
    $result = $paciente->editarPaciente();

    if ($result != "") {
        header("Location:../Vision/GuiPaciente.php");
    } else {
        echo "<script languaje='javacript'>alert('Error de transaccion');
             windows.location='../Vision/GuiPaciente.php'</script>";
    }
}

// ELIMINAR
if (isset($_POST["OK2"]) && $_POST["OK2"] == "Eliminar") {
    
    $paciente = new Paciente();
    $paciente->setRut($rut);
    $result = $paciente->eliminarPaciente();

    if ($result != "") {
        header("Location:../Vision/GuiPaciente.php");
    } else {
        echo "<script languaje='javacript'>alert('Error de transaccion');
             windows.location='../Vision/GuiPaciente.php'</script>";
    }
}