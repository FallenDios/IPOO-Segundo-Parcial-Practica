<?php

class PartidoBasquet extends Partido {
    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2){
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
    }

    public function coeficientePartido(){
        $goles = $this->getCantGolesE1() + $this->getCantGolesE2();
        $jugadores = $this->getObjEquipo1()->getCantJugadores();
        $coefBase = $this->getCoefBase();

        return $coefBase * $goles * $jugadores;
    }
}