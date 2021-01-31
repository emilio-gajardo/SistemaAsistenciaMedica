<?php

require_once("../Datos/Conexion.php");

class Remuneracion {

    private $codigo;
    private $rutenfermera;
    private $cantturnos;
    private $valorturn;
    private $total;
    private $fecharemuneracion;

    public function __construct() {
        
    }

    public function Remuneracion($codigo, $rutenfermera, $cantturnos, $valorturn, $total, $fecharemuneracion) {
        $this->codigo = $codigo;
        $this->rutenfermera = $rutenfermera;
        $this->cantturnos = $cantturnos;
        $this->valorturn = $valorturn;
        $this->total = $total;
        $this->fecharemuneracion = $fecharemuneracion;
    }

    function getCodigo() {return $this->codigo;}
    function getRutenfermera() {return $this->rutenfermera;}
    function getCantturnos() {return $this->cantturnos;}
    function getValorturn() {return $this->valorturn;}
    function getTotal() {return $this->total;}
    function getFechaRemuneracion() {return $this->fecharemuneracion;}

    function setCodigo($codigo) {$this->codigo = $codigo;}
    function setRutenfermera($rutenfermera) {$this->rutenfermera = $rutenfermera;}
    function setCantturnos($cantturnos) {$this->cantturnos = $cantturnos;}
    function setValorturn($valorturn) {$this->valorturn = $valorturn;}
    function setTotal($total) {$this->total = $total;}
    function setFecharemuneracion($fecharemuneracion) {$this->fecharemuneracion = $fecharemuneracion;}

    // AGREGAR
    public function agregarRemuneracion() {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "INSERT INTO REMUNERACION VALUES(
                " . $this->codigo . ",
                '" . $this->rutenfermera . "',
                " . $this->cantturnos . ",
                " . $this->valorturn . ",
                " . $this->total . ",
                '" . $this->fecharemuneracion . "')";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

    // LISTAR
    public function listarRemuneracion() {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "SELECT * FROM REMUNERACION";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

    // EDITAR
    public function editarRemuneracion() {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "UPDATE REMUNERACION SET
                CANTTURNOS=" . $this->cantturnos . ",
                VALORTURN=" . $this->valorturn . ",
                TOTAL=" . $this->total . ",
                FECHAREMUNERACION='" . $this->fecharemuneracion . "'
                WHERE(CODIGO=" . $this->codigo . " && RUTENFERMERA='" . $this->rutenfermera . "')";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

    // ELIMINAR
    public function eliminarRemuneracion() {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "DELETE FROM REMUNERACION WHERE(CODIGO=" . $this->codigo . ")";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

    // BUSCAR
    public function buscarRemuneracion() {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "SELECT * FROM REMUNERACION WHERE(CODIGO=" . $this->codigo . ")";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

}

?>
