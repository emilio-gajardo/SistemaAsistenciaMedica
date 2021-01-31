<?php

require_once("../Datos/Conexion.php");

class Turno {

    private $idturno;
    private $rutpaciente;
    private $rutenfermera;
    private $fechaturno;
    private $presion;
    private $saturacion;
    private $temperatura;
    private $observacion;

    public function __construct() {
        
    }

    public function Turno($idturno, $rutpaciente, $rutenfermera, $fechaturno, $presion, $saturacion, $temperatura, $observacion) {

        $this->idturno = $idturno;
        $this->rutpaciente = $rutpaciente;
        $this->rutenfermera = $rutenfermera;
        $this->fechaturno = $fechaturno;
        $this->presion = $presion;
        $this->saturacion = $saturacion;
        $this->temperatura = $temperatura;
        $this->observacion = $observacion;
    }

    function getIdturno(){return $this->idturno;}
    function getRutpaciente() {return $this->rutpaciente;}
    function getRutenfermera() {return $this->rutenfermera;}
    function getFechaturno() {return $this->fechaturno;}
    function getPresion() {return $this->presion;}
    function getSaturacion() {return $this->saturacion;}
    function getTemperatura() {return $this->temperatura;}
    function getObservacion() {return $this->observacion;}
    
    function setIdturno($idturno){$this->idturno = $idturno;}
    function setRutpaciente($rutpaciente) {$this->rutpaciente = $rutpaciente;}
    function setRutenfermera($rutenfermera) {$this->rutenfermera = $rutenfermera;}
    function setFechaturno($fechaturno) {$this->fechaturno = $fechaturno;}
    function setPresion($presion) {$this->presion = $presion;}
    function setSaturacion($saturacion) {$this->saturacion = $saturacion;}
    function setTemperatura($temperatura) {$this->temperatura = $temperatura;}
    function setObservacion($observacion) {$this->observacion = $observacion;}

    // AGREGAR
    public function agregarTurno()
    {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "INSERT INTO TURNO VALUES(
                '" . $this->idturno. "',
                '" . $this->rutpaciente . "',
                '" . $this->rutenfermera . "',
                '" . $this->fechaturno . "',
                " . $this->presion . ",
                " . $this->saturacion . ",
                " . $this->temperatura . ",
                '" . $this->observacion . "')";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

    // LISTAR
    public function listarTurno() 
    {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "SELECT * FROM TURNO";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

    // EDITAR
    public function editarTurno()
    {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "UPDATE TURNO SET                 
                FECHATURNO='" . $this->fechaturno . "',
                PRESION=" . $this->presion . ",
                SATURACION=" . $this->saturacion . ",
                TEMPERATURA=" . $this->temperatura . ",
                OBSERVACION='" . $this->observacion . "'
                WHERE(IDTURNO='".$this->idturno."')";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

    // ELIMINAR
    public function eliminarTurno()
    {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "DELETE FROM TURNO WHERE(IDTURNO='" . $this->idturno . "')";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

    // BUSCAR
    public function buscarTurno() {
        $conex = new Conexion();
        $conex->abrirConexionURL();

        $sql = "SELECT * FROM TURNO WHERE(IDTURNO='" .$this->idturno."')";

        $result = $conex->ejecutarTransaccion($sql);
        return $result;
    }

}
