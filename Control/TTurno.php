
<?php

require_once("../Modelo/Turno.php");

if (isset($_POST["idturno"]) && $_POST["idturno"] != "") {$idturno = $_POST["idturno"];}
if (isset($_POST["rutpaciente"]) && $_POST["rutpaciente"] != "") {$rutpaciente = $_POST["rutpaciente"];}
if (isset($_POST["rutenfermera"]) && $_POST["rutenfermera"] != "") {$rutenfermera = $_POST["rutenfermera"];}
if (isset($_POST["fechaturno"]) && $_POST["fechaturno"] != "") {$fechaturno = $_POST["fechaturno"];}
if (isset($_POST["presion"]) && $_POST["presion"] != "") {$presion = $_POST["presion"];}
if (isset($_POST["saturacion"]) && $_POST["saturacion"] != "") {$saturacion = $_POST["saturacion"];}
if (isset($_POST["temperatura"]) && $_POST["temperatura"] != "") {$temperatura = $_POST["temperatura"];}
if (isset($_POST["observacion"]) && $_POST["observacion"] != "") {$observacion = $_POST["observacion"];}


// AGREGAR
if (isset($_POST["OK"]) && $_POST["OK"] == "Ingresar") 
{
    $turno = new Turno();
    $turno->Turno($idturno, $rutpaciente, $rutenfermera, $fechaturno, $presion, $saturacion, $temperatura, $observacion);
    $result = $turno->agregarTurno();

    if ($result != "") {
        header("Location:../Vision/GuiTurno.php");
    } else {
        echo "<script languaje='javacript'>alert('Error de transaccion');
             windows.location='../Vision/GuiTurno.php'</script>";
    }
}

// EDITAR
if (isset($_POST["OK1"]) && $_POST["OK1"] == "Modificar") 
{

    $turno = new Turno();
    $turno->Turno($idturno, $rutpaciente, $rutenfermera, $fechaturno, $presion, $saturacion, $temperatura, $observacion);
    $result = $turno->editarTurno();

    if ($result != "") {
        header("Location:../Vision/GuiTurno.php");
    } else {
        echo "<script languaje='javacript'>alert('Error de transaccion');
             windows.location='../Vision/GuiTurno.php'</script>";
    }
}

// ELIMINAR
if (isset($_POST["OK2"]) && $_POST["OK2"] == "Eliminar") 
{

    $turno = new Turno();
    $turno->setIdturno($idturno);
    $result = $turno->eliminarTurno();

    if ($result != "") {
        header("Location:../Vision/GuiTurno.php");
    } else {
        echo "<script languaje='javacript'>alert('Error de transaccion');
             windows.location='../Vision/GuiTurno.php'</script>";
    }
}

?>