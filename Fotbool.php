<?php
class PartidoFutbol extends Partido {
    private $coefMenores;
    private $coefJuveniles;
    private $coefMayores;

    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2){
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        $this->coefMenores = 0.13;
        $this->coefJuveniles = 0.19;
        $this->coefMayores = 0.27;
    }

    public function setCoefMenores($valor){ $this->coefMenores = $valor; }
    public function getCoefMenores(){ return $this->coefMenores; }

    public function setCoefJuveniles($valor){ $this->coefJuveniles = $valor; }
    public function getCoefJuveniles(){ return $this->coefJuveniles; }

    public function setCoefMayores($valor){ $this->coefMayores = $valor; }
    public function getCoefMayores(){ return $this->coefMayores; }

    public function coeficientePartido(){
        $categoria = $this->getObjEquipo1()->getObjCategoria()->getDescripcion();
        $goles = $this->getCantGolesE1() + $this->getCantGolesE2();
        $jugadores = $this->getObjEquipo1()->getCantJugadores(); // ya validamos que son iguales

        if ($categoria == "Menores") {
            $coef = $this->getCoefMenores();
        } elseif ($categoria == "Juveniles") {
            $coef = $this->getCoefJuveniles();
        } else {
            $coef = $this->getCoefMayores();
        }

        return $coef * $goles * $jugadores;
    }
}
?>
