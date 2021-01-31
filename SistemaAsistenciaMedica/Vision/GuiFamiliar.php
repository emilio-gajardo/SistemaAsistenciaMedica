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
                                    Ingresar & Modificar Familiar
                                </h3>
                            </div>
                            <div class="panel-body">
                                <form id="tab" action="../Control/TFamiliar.php" method="post">
                                    <div class="form-group">
                                        <label for="rut">Rut Familiar</label>
                                        <input type="text" class="form-control" id="rut" name="rut" placeholder="Ingresar Rut Familiar" required>
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
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar Nombres" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="apel">Apellidos</label>
                                        <input type="text" class="form-control" id="apel" name="apel" placeholder="Ingresar Apellidos" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="fono">Fono</label>
                                        <input type="number" class="form-control" id="fono" name="fono" placeholder="Ingresar Fono" min="1" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingresar Email" min="1" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="tipo">Tipo Relación</label>
                                        <select class="form-control" name="tipo">
                                            <option value="Hijo/a">Hijo/a</option>
                                            <option value="Pareja">Pareja</option>
                                            <option value="Primo/a">Primo/a</option>
                                            <option value="Tio/a">Tio/a</option>
                                            <option value="Sobrino/a">Sobrino/a</option>
                                            <option value="Otro/a">Otro/a</option>
                                        </select>
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
                                Listado de Familiares
                            </h3>
                        </div>

                        <form id="tab" action="../Control/TFamiliar.php" method="post">
                            <table class="table table-striped text-info table-condensed">
                                <tr>
                                    <th>Rut Familiar</th>
                                    <th>Rut Paciente</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Fono</th>
                                    <th>Email</th>
                                    <th>Tipo</th>
                                    <th>Operación</th>
                                </tr>

                                <?php
                                require_once('../Modelo/Familiar.php');
                                $objCat = new Familiar();
                                $datos = $objCat->listarFamiliar();

                                while ($reg = mysqli_fetch_row($datos)) {

                                    echo "<tr class='active'>";
                                    echo "<td>" . $reg[0] . "</td>";
                                    echo "<td>" . $reg[1] . "</td>";
                                    echo "<td>" . $reg[2] . "</td>";
                                    echo "<td>" . $reg[3] . "</td>";
                                    echo "<td>" . $reg[4] . "</td>";
                                    echo "<td>" . $reg[5] . "</td>";
                                    echo "<td>" . $reg[6] . "</td>";

                                    echo "<td>";
                                    echo "<form id='tab' action='../Control/TFamiliar.php' method='post'>" .
                                        "<input type='hidden' id='rut' name='rut' value=" . $reg[0] . ">
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