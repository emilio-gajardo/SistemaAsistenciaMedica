<?php

require_once('../Modelo/Remuneracion.php');

if (isset($_POST["codigo"]) && $_POST["codigo"] != "") {$codigo = $_POST["codigo"];}
if (isset($_POST["rutenfermera"]) && $_POST["rutenfermera"] != "") {$rutenfermera = $_POST["rutenfermera"];}
if (isset($_POST["cantturnos"]) && $_POST["cantturnos"] != "") {$cantturnos = $_POST["cantturnos"];}
if (isset($_POST["valorturn"]) && $_POST["valorturn"] != "") {$valorturn = $_POST["valorturn"];}
if (isset($_POST["total"]) && $_POST["total"] != "") {$total = $_POST["total"];}
if (isset($_POST["fecharemuneracion"]) && $_POST["fecharemuneracion"] != "") {$fecharemuneracion = $_POST["fecharemuneracion"];}


// AGREGAR
if (isset($_POST["OK"]) && $_POST["OK"] == "Ingresar") {

    $remuneracion = new Remuneracion();

    $total = $cantturnos * $valorturn;

    $remuneracion->Remuneracion($codigo, $rutenfermera, $cantturnos, $valorturn, $total, $fecharemuneracion);
    $result = $remuneracion->agregarRemuneracion();

    if ($result != "") {
        header("Location:../Vision/GuiRemuneracion.php");
    } else {
        echo "<script languaje='javacript'>alert('Error de transaccion');
             windows.location='../Vision/GuiRemuneracion.php'</script>";
    }
}

// EDITAR
if (isset($_POST["OK1"]) && $_POST["OK1"] == "Modificar") {

    $remuneracion = new Remuneracion();

    $total = $cantturnos * $valorturn;
    
    $remuneracion->Remuneracion($codigo, $rutenfermera, $cantturnos, $valorturn, $total, $fecharemuneracion);
    $result = $remuneracion->editarRemuneracion();

    if ($result != "") {
        header("Location:../Vision/GuiRemuneracion.php");
    } else {
        echo "<script languaje='javacript'>alert('Error de transaccion');
             windows.location='../Vision/GuiRemuneracion.php'</script>";
    }
}

// ELIMINAR
if (isset($_POST["OK2"]) && $_POST["OK2"] == "Eliminar") {

    $remuneracion = new Remuneracion();
    $remuneracion->setCodigo($codigo);
    $result = $remuneracion->eliminarRemuneracion();

    if ($result != "") {
        header("Location:../Vision/GuiRemuneracion.php");
    } else {
        echo "<script languaje='javacript'>alert('Error de transaccion');
             windows.location='../Vision/GuiRemuneracion.php'</script>";
    }
}
