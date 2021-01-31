<?php
class Conexion
{
    private $usuario = "root";
    private $clave = "2020";
    private $host = "127.0.0.1";
    private $bdatos = "bdasistencia";
    private $conex;

    public function __construct()
    { }

    public function abrirConexionURL()
    {
        $this->conex = mysqli_connect($this->host, $this->usuario, $this->clave, $this->bdatos) or die("Error de URL");
        return $this->conex;
    }

    public function ejecutarTransaccion($sql)
    {
        $conex = $this->abrirConexionURL();
        $result = mysqli_query($conex, $sql);
        $this->cerrarURL($conex);
        return $result;
    }

    public function cerrarURL($conex)
    {
        $res = mysqli_close($this->conex);
    }
}
