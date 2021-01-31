<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../Bootstrap/css/estilos.css">
    <title>Familiar</title>

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
                                    Ingresar & Modificar Remuneraciones
                                </h3>
                            </div>
                            <div class="panel-body">
                                <form id="tab" action="../Control/TRemuneracion.php" method="post">


                                    <div class="form-group">
                                        <label for="codigo">Codigo</label>
                                        <input type="number" class="form-control" id="codigo" name="codigo" placeholder="Código" min="" required>
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
                                        <label for="cantturnos">Cantidad de turnos</label>
                                        <input type="number" class="form-control" id="cantturnos" name="cantturnos" min="1" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="valorturn">Valor del turno</label>
                                        <select class="form-control" name="valorturn">
                                            <option value="10000">$10.000</option>
                                            <option value="20000">$20.000</option>
                                            <option value="30000">$30.000</option>
                                            <option value="40000">$40.000</option>
                                        </select>
                                    </div>

                                    <!--
                                    <div class="form-group">
                                        <label for="total">$ Total</label>
                                        <input type="number" class="form-control" id="total" name="total" min="1" >
                                    </div>-->

                                    <div class="form-group">
                                        <label for="fecharemuneracion">Fecha Remuneración</label>
                                        <input type="date" class="form-control" id="fecharemuneracion" name="fecharemuneracion" required>
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
                                Listado de Remuneraciones
                            </h3>
                        </div>

                        <form id="tab" action="../Control/TRemuneracion.php" method="post">
                            <table class="table table-striped text-info table-condensed">
                                <tr>
                                    <th>Código</th>
                                    <th>Rut Enfermera</th>
                                    <th>N° turnos</th>
                                    <th>Valor Turno</th>
                                    <th>Total</th>
                                    <th>Fecha</th>
                                    <th>Operación</th>
                                </tr>

                                <?php
                                require_once('../Modelo/Remuneracion.php');
                                $objCat = new Remuneracion();
                                $datos = $objCat->listarRemuneracion();

                                while ($reg = mysqli_fetch_row($datos)) {

                                    echo "<tr class='active'>";
                                    echo "<td>" . $reg[0] . "</td>";
                                    echo "<td>" . $reg[1] . "</td>";
                                    echo "<td>" . $reg[2] . "</td>";
                                    echo "<td>" . $reg[3] . "</td>";
                                    echo "<td>" . $reg[4] . "</td>";
                                    echo "<td>" . $reg[5] . "</td>";

                                    echo "<td>";
                                    echo "<form id='tab' action='../Control/TRemuneracion.php' method='post'>" .
                                        "<input type='hidden' id='codigo' name='codigo' value=" . $reg[0] . ">
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