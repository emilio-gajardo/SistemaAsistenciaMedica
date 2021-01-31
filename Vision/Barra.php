<!--
    Desarrollado por: Emilio Gajardo
    Fecha: 13-06-2019
-->

<link rel="stylesheet" href="../Bootstrap/css/all.css">
<script src="../Bootstrap/js/all.js"></script>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Este boton despliega la barra de navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="Home.php">
                <!--<span class="glyphicon glyphicon-globe" aria-hidden="true"></span>-->
                <i class="fas fa-clinic-medical"></i>
                Asistencia Médica
            </a>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="GuiPaciente.php">
                        <i class="fas fa-wheelchair"></i>
                        Pacientes
                    </a>
                </li>

                <li>
                    <a href="GuiEnfermera.php">
                        <i class="fas fa-user-nurse"></i>
                        Enfermeras
                    </a>
                </li>

                <li>
                    <a href="GuiFamiliar.php">
                        <i class="fas fa-users"></i>
                        Familiares
                    </a>
                </li>


                <li>
                    <a href="GuiTurno.php">
                        <i class="fas fa-clock"></i>
                        Turnos
                    </a>
                </li>

                <li>
                    <a href="GuiRemuneracion.php">
                        <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                        Remuneraciones
                    </a>
                </li>

                <li>
                    <a href="../GuiLogin.php">
                        Login
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </li>
                <li>
                    <a>
                        <?php session_start(); ?>
                        <?php
                        if (isset($_SESSION['usuario'])) {
                            $nombre = $_SESSION['usuario'];
                            echo ("<font color='fucsia'>User: $nombre</font>  ");
                        } else {
                            header("Location:GuiLogin.php");
                        }
                        ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>