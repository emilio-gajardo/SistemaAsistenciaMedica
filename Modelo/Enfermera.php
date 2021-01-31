<?php

require_once("../Datos/Conexion.php");

class Enfermera
{

    private $rut;
    private $nombre;
    private $apel;
    private $valor;

    public function __construct()
    { }

    public function Enfermera($rut, $nombre, $apel, $valor)
    {
        $this->rut = $rut;
        $this->nombre = $nombre;
        $this->apel = $apel;
        $this->valor = $valor;
    }

    function getRut(){return $this->rut;}
    function getNombre(){return $this->nombre;}
    function getApel(){return $this->apel;}
    function getValor(){return $this->valor;}

    function setRut($rut){$this->rut = $rut;}
    function setNombre($nombre){$this->nombre = $nombre;}
    function setApel($apel){$this->apel = $apel;}
    function setValor($valor){$this->valor = $valor;}



    // AGREGAR
    public function agregarEnfermera()
    {

        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "INSERT INTO ENFERMERA VALUES(
                '" . $this->rut . "',
                '" . $this->nombre . "',
                '" . $this->apel . "',
                '" . $this->valor . "')";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

    // LISTAR
    public function listarEnfermera()
    {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "SELECT * FROM ENFERMERA";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

    // EDITAR
    public function editarEnfermera()
    {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "UPDATE ENFERMERA SET
                NOMBRE='" . $this->nombre . "',
                APEL='" . $this->apel . "',
                VALOR=" . $this->valor . "
                WHERE(RUT='" . $this->rut . "')";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

    // ELIMINAR
    public function eliminarEnfermera()
    {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "DELETE FROM ENFERMERA WHERE(RUT='" . $this->rut . "')";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

    // BUSCAR
    public function buscarEnfermera()
    {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "SELECT * FROM ENFERMERA WHERE(RUT='" . $this->rut . "')";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }
}
