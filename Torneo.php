<?php

class Torneo{

    //ATRIBUTOS
    private $colPartidos;
    private $importePremio;

    //CONSTRUCTOR
    public function __construct($importePremio){
        $this->colPartidos = [];
        $this->importePremio = $importePremio;
    }

    //GETTERS Y SETTERS
    public function getColPartidos(){
        return $this->colPartidos;
    }

    public function setColPartidos($colPartidos){
        $this->colPartidos = $colPartidos;
    }

    public function getImportePremio(){
        return $this->importePremio;
    }
    public function setImportePremio($importePremio){
        $this->importePremio = $importePremio;
    }


  public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido) {
    $partido = null;

    if (
        $objEquipo1->getCantJugadores() == $objEquipo2->getCantJugadores() &&
        $objEquipo1->getObjCategoria()->getDescripcion() == $objEquipo2->getObjCategoria()->getDescripcion()
    ) {
        $idPartido = count($this->colPartidos) + 1;

        if (strtolower($tipoPartido) == 'futbol') {
            $partido = new PartidoFutbol($idPartido, $fecha, $objEquipo1, 0, $objEquipo2, 0);
        } elseif (strtolower($tipoPartido) == 'basquetbol') {
            $partido = new PartidoBasquet($idPartido, $fecha, $objEquipo1, 0, $objEquipo2, 0);
        }

        if ($partido !== null) {
            $this->colPartidos[] = $partido;
        }
    }

    return $partido;
}
 public function darGanadores($deporte) {
        $ganadores = [];

        foreach ($this->colPartidos as $partido) {
            if ((strtolower($deporte) == 'futbol' && $partido instanceof PartidoFutbol) ||
                (strtolower($deporte) == 'basquet' && $partido instanceof PartidoBasquet)) {
                $ganadores = array_merge($ganadores, $partido->darEquipoGanador());
            }
        }

        return $ganadores;
    }

    public function calcularPremioPartido($objPartido) {
        $coef = $objPartido->coeficientePartido();
        $premio = $coef * $this->getImportePremio();
        $ganadores = $objPartido->darEquipoGanador();

        $resultado = ['equipoGanador' => $ganadores, 'premioPartido' => $premio];
        return $resultado;
    }

    public function __toString() {
        $cadena = "Importe premio: " . $this->getImportePremio() . "\n";
        $cadena .= "Partidos registrados: \n";
        foreach ($this->getColPartidos() as $partido) {
            $cadena .= $partido . "\n";
        }
        return $cadena;
    }

}