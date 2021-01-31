<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Utilitarios/Maqueta.css" />
    <link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="Bootstrap/css/all.css">
    <script src="Bootstrap/js/all.js"></script>
    <title>Enlace</title>
</head>

<body background="Img/fondo.png">
    <?php
    if (isset($_SESSION['usuario'])) {
        if (ini_get("session.use_cookies")) {
            $params = session . use_cookies_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        session_destroy();
    } else { }
    ?>

    <div class="container">
        <div class="row">

            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 style="text-align: center">
                            
                            <i class="fas fa-user-circle"></i>
                            <br>
                            Ingreso de Usuarios
                        </h4>
                    </div>
                    <div class="panel-body text-center">
                        <i>Ingrese sus credenciales para acceder al sistema</i>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <div>
        <center>
            <form action="GuiLogin.php" method="post">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <table class='gridtable' type='text/css' href='Utilitarios/Maqueta.css'>
                    <tr>
                        <th bgcolor=#6699ff>USUARIO</th>
                        <td bgcolor=#6699ff>
                            <input type=text name=usuario />
                        </td>
                    </tr>

                    <tr>
                        <th bgcolor=#6699ff>CLAVE</th>
                        <td bgcolor=#6699ff>
                            <input type=password name=clave />
                        </td>
                    </tr>

                    <tr>
                        <th bgcolor=#6699ff>LOGIN</th>
                        <td bgcolor=#6699ff>
                            <input type=submit name=OK value='Enlace' />
                        </td>
                    </tr>
                </table>
            </form>
        </center>
    </div>
</body>

</html>

<?php
$perfil = "";
if (isset($_POST["usuario"]) && $_POST["usuario"] != "") {
    $usuario = $_POST["usuario"];
}
if (isset($_POST["clave"]) && $_POST["clave"] != "") {
    $clave = $_POST["clave"];
}
if (isset($_POST["OK"]) && $_POST["OK"] == "Enlace") {
    $val = 0;
    $val = evaluarUsuario($usuario, $clave);
    if ($val == 1) {
        session_start();
        $_SESSION['usuario'] = $usuario;
        header("Location:Vision/Home.php");
    } else {
        header("Location:Vision/PantallaError.php");
    }
}

function evaluarUsuario($usuario, $clave)
{
    include("Datos/Conexion.php");
    $resp = 0;
    $us = "";
    $cl = "";
    $prf = "";
    $objConex = new Conexion();
    $objConex->abrirConexionURL();
    $sql = "SELECT * FROM AUTENTICACION WHERE(USUARIO = '" . $usuario . "' && CLAVE='" . $clave . "')";
    $datos = $objConex->ejecutarTransaccion($sql);
    while ($reg = mysqli_fetch_row($datos)) {
        $us = $reg[0];
        $cl = $reg[1];
        $prf = $reg[2];
        $resp = 1;
    }
    return $resp;
}
?>