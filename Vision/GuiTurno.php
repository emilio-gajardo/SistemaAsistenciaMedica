<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../Bootstrap/css/estilos.css">
    <title>Turno</title>

</head>

<body>
    <?php include('Barra.php'); ?>;
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    Ingresar & Modificar Turno
                                </h3>
                            </div>
                            <div class="panel-body">
                                <form id="tab" action="../Control/TTurno.php" method="post">

                                    <div class="form-group">
                                        <label for="idturno">Id Turno</label>
                                        <input type="text" class="form-control" id="idturno" name="idturno" placeholder="Ingresar Id Turno" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="rutpaciente">Rut Paciente</label>
                                        <select class="form-control" name="rutpaciente">
                                            <?php
                                            require_once('../Modelo/Paciente.php');
                                            $objClie = new Paciente();
                                            $datos = $objClie->listarPaciente();
                                            while ($reg = mysqli_fetch_row($datos)) {
                                                echo "<option value='" . $reg[0] . "'>" . $reg[0] . " " . $reg[1] . " " . $reg[2] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="rutenfermera">Rut Enfermera</label>
                                        <select class="form-control" name="rutenfermera">
                                            <?php
                                            require_once('../Modelo/Enfermera.php');
                                            $objClie = new Enfermera();
                                            $datos = $objClie->listarEnfermera();
                                            while ($reg = mysqli_fetch_row($datos)) {
                                                echo "<option value='" . $reg[0] . "'>" . $reg[0] . " " . $reg[1] . " " . $reg[2] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>



                                    <div class="form-group">
                                        <label for="fechaturno">Fecha de Turno</label>
                                        <input type="date" class="form-control" id="fechaturno" name="fechaturno" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="presion">Presión Arterial</label>
                                        <input type="number" class="form-control" id="presion" name="presion" placeholder="Ingresar Presión" min="1" step="0.01" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="saturacion">Saturación</label>
                                        <input type="number" class="form-control" id="saturacion" name="saturacion" placeholder="Ingresar Saturación" min="1" step="0.01" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="temperatura">Temperatura</label>
                                        <input type="number" class="form-control" id="temperatura" name="temperatura" placeholder="Ingresar Temperatura" min="1" step="0.01" required>
                                    </div>

                                    <div class="form-group">
                                        Observaciones
                                        <textarea name="observacion" id="observacion" cols="35" rows="4" required></textarea>
                                    </div>


                                    <button type="submit" class="btn btn-success" name="OK" value="Ingresar">Ingresar</button>
                                    <button type="submit" class="btn btn-warning" name="OK1" value="Modificar">Modificar</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-heading text-center">
                            <h3 class="panel-title">
                                Listado de Turnos
                            </h3>
                        </div>

                        <form id="tab" action="../Control/TTurno.php" method="post">
                            <table class="table table-striped text-info table-condensed">
                                <tr>
                                    <th>Id Turno</th>
                                    <th>Rut Paciente</th>
                                    <th>Rut Enfermera</th>
                                    <th>Fecha</th>
                                    <th>Presión</th>
                                    <th>Saturación</th>
                                    <th>Temperatura</th>
                                    <th>Observación</th>
                                    <th>Operación</th>
                                </tr>

                                <?php
                                require_once('../Modelo/Turno.php');
                                $objCat = new Turno();
                                $datos = $objCat->listarTurno();

                                while ($reg = mysqli_fetch_row($datos)) {

                                    echo "<tr class='active'>";
                                    echo "<td>" . $reg[0] . "</td>";
                                    echo "<td>" . $reg[1] . "</td>";
                                    echo "<td>" . $reg[2] . "</td>";
                                    echo "<td>" . $reg[3] . "</td>";
                                    echo "<td>" . $reg[4] . "</td>";
                                    echo "<td>" . $reg[5] . "</td>";
                                    echo "<td>" . $reg[6] . "</td>";
                                    echo "<td>" . $reg[7] . "</td>";

                                    echo "<td>";
                                    echo "<form id='tab' action='../Control/TTurno.php' method='post'>" .
                                        "<input type='hidden' id='idturno' name='idturno' value=" . $reg[0] . ">
                                     <button type='submit' class='btn btn-danger' name='OK2' value='Eliminar'>Eliminar</button>";
                                    echo "</form >";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </form>

                    </div>
                </div>
            </div>
        </div>
</body>

</html>
<script src="../Bootstrap/js/jquery.min.js"></script>
<script src="../Bootstrap/js/bootstrap.js"></script>