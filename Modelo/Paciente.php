<?php

require_once("../Datos/Conexion.php");

class Paciente
{

    private $rut;
    private $nombre;
    private $apel;
    private $edad;
    private $medicamento;
    private $enfermedad;

    public function __construct()
    { }

    public function Paciente($rut, $nombre, $apel, $edad, $medicamento, $enfermedad)
    {
        $this->rut = $rut;
        $this->nombre = $nombre;
        $this->apel = $apel;
        $this->edad = $edad;
        $this->medicamento = $medicamento;
        $this->enfermedad = $enfermedad;
    }

    function getRut()
    {
        return $this->rut;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function getApel()
    {
        return $this->apel;
    }

    function getEdad()
    {
        return $this->edad;
    }

    function getMedicamento()
    {
        return $this->medicamento;
    }

    function getEnfermedad()
    {
        return $this->enfermedad;
    }



    function setRut($rut)
    {
        $this->rut = $rut;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function setApel($apel)
    {
        $this->apel = $apel;
    }

    function setEdad($edad)
    {
        $this->edad = $edad;
    }

    function setMedicamento($medicamento)
    {
        $this->medicamento = $medicamento;
    }

    function setEnfermedad($enfermedad)
    {
        $this->enfermedad = $enfermedad;
    }

    // AGREGAR
    public function agregarPaciente()
    {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "INSERT INTO PACIENTE VALUES(
                '" . $this->rut . "',
                '" . $this->nombre . "',
                '" . $this->apel . "',
                " . $this->edad . ",
                '" . $this->medicamento . "',
                '" . $this->enfermedad . "')";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

    // LISTAR
    public function listarPaciente()
    {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "SELECT * FROM PACIENTE";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

    // EDITAR
    public function editarPaciente()
    {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "UPDATE PACIENTE SET
                NOMBRE='" . $this->nombre . "',
                APEL='" . $this->apel . "',
                EDAD=" . $this->edad . ",
                MEDICAMENTO='" . $this->medicamento . "',
                ENFERMEDAD='" . $this->enfermedad . "'
                WHERE(RUT='" . $this->rut . "')";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

    // ELIMINAR
    public function eliminarPaciente()
    {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "DELETE FROM PACIENTE WHERE(RUT='" . $this->rut . "')";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

    // BUSCAR
    public function buscarPaciente()
    {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "SELECT * FROM PACIENTE WHERE(RUT='" . $this->rut . "')";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }
}
