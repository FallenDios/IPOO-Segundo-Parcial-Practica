<?php
abstract class Partido{
    private $idpartido;
    private $fecha;
    private $objEquipo1;
    private $cantGolesE1;
    private $objEquipo2;
    private $cantGolesE2;
    private $coefBase;

    //CONSTRUCTOR
    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2){
            $this->idpartido = $idpartido;
            $this->fecha = $fecha;
            $this->objEquipo1 =$objEquipo1;
            $this->cantGolesE1 = $cantGolesE1;
            $this->objEquipo2 = $objEquipo2;
            $this->cantGolesE2 = $cantGolesE2;
            $this->coefBase = 0.5;


    }

    //OBSERVADORES
    public function setidpartido($idpartido){
         $this->idpartido= $idpartido;
    }

    public function getIdpartido(){
        return $this->idpartido;
    }

    public function setFecha($fecha){
        $this->fecha= $fecha;
    }

    public function getFecha(){
        return $this->fecha;
    }


 public function setCantGolesE1($cantGolesE1){
        $this->cantGolesE1= $cantGolesE1;
    }

    public function getCantGolesE1(){
        return $this->cantGolesE1;
    }
 public function setCantGolesE2($cantGolesE2){
        $this->cantGolesE2= $cantGolesE2;
    }

    public function getCantGolesE2(){
        return $this->cantGolesE2;
    }



 public function setObjEquipo1($objEquipo1){
        $this->objEquipo1= $objEquipo1;
    }
    public function getObjEquipo1(){
        return $this->objEquipo1;
    }


 public function setObjEquipo2($objEquipo2){
        $this->objEquipo2= $objEquipo2;
    }
    public function getObjEquipo2(){
        return $this->objEquipo2;
    }




     public function setCoefBase($coefBase){
         $this->coefBase = $coefBase;
    }
      public function getCoefBase(){
        return $this->coefBase;
    }

//Funcion dar equipo ganador

public function darEquipoGanador(){
    $equipo1= $this->getObjEquipo1();
    $equipo2= $this->getObjEquipo2();
    $golesE1= $this->getCantGolesE1();
    $golesE2= $this->getCantGolesE2();

    if($golesE1 > $golesE2){
        $ganador= [$equipo1];
    }elseif($golesE1 < $golesE2){
        $ganador= [$equipo2];
    }else{
        $ganador= [$equipo1, $equipo2];
    }
    return $ganador;
}

abstract public function coeficientePartido();

    public function __toString(){
        $cadena = "idPartido: " . $this->getIdpartido() . "\n";
        $cadena .= "Fecha: " . $this->getFecha() . "\n";
        $cadena .= "Equipo 1: \n" . $this->getObjEquipo1();
        $cadena .= "Goles E1: " . $this->getCantGolesE1() . "\n";
        $cadena .= "Equipo 2: \n" . $this->getObjEquipo2();
        $cadena .= "Goles E2: " . $this->getCantGolesE2() . "\n";
        return $cadena;
    }
}


?>