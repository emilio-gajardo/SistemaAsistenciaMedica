<?php

require_once("../Datos/Conexion.php");

class Familiar 
{

    private $rut;
    private $rutpaciente;
    private $nombre;
    private $apel;
    private $fono;
    private $email;
    private $tipo;

    public function __construct() 
    {}

    public function Familiar($rut, $rutpaciente, $nombre, $apel, $fono, $email, $tipo)
     {
        $this->rut = $rut;
        $this->rutpaciente = $rutpaciente;
        $this->nombre = $nombre;
        $this->apel = $apel;
        $this->fono = $fono;
        $this->email = $email;
        $this->tipo = $tipo;
    }

    function getRut() {return $this->rut;}
    function getRutpaciente() {return $this->rutpaciente;}
    function getNombre() {return $this->nombre;}
    function getApel() {return $this->apel;}
    function getFono() {return $this->fono;}
    function getEmail() {return $this->email;}
    function getTipo() {return $this->tipo;}

    function setRut($rut) {$this->rut = $rut;}
    function setRutpaciente($rutpaciente) {$this->rutpaciente = $rutpaciente;}
    function setNombre($nombre) {$this->nombre = $nombre;}
    function setApel($apel) {$this->apel = $apel;}
    function setFono($fono) {$this->fono = $fono;}
    function setEmail($email) {$this->email = $email;}
    function setTipo($tipo) {$this->tipo = $tipo;}

    
    // AGREGAR
    public function agregarFamiliar() 
    {
     
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "INSERT INTO FAMILIAR VALUES(
                '" . $this->rut . "',
                '" . $this->rutpaciente . "',
                '" . $this->nombre . "',
                '" . $this->apel . "',
                " . $this->fono . ",
                '" . $this->email . "',
                '" . $this->tipo . "')";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

    // LISTAR
    public function listarFamiliar() 
    {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "SELECT * FROM FAMILIAR";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

    // EDITAR
    public function editarFamiliar() 
    {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "UPDATE FAMILIAR SET 
                RUTPACIENTE='" . $this->rutpaciente . "',
                NOMBRE='" . $this->nombre . "',
                APEL='" . $this->apel . "',
                FONO=" . $this->fono . ",
                EMAIL='" . $this->email . "',
                TIPO='" . $this->tipo . "'
                WHERE(RUT='" . $this->rut . "')";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

    // ELIMINAR
    public function eliminarFamiliar() 
    {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "DELETE FROM FAMILIAR WHERE(RUT='" . $this->rut . "')";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

    // BUSCAR
    public function buscarFamiliar() {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "SELECT * FROM FAMILIAR WHERE(RUT='" . $this->rut . "')";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

}

?>