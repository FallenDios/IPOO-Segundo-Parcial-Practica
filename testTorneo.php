<?php
include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("Fotbool.php");
include_once("Basket.php");

$catMayores = new Categoria(1,'Mayores');
$catJuveniles = new Categoria(2,'juveniles');
$catMenores = new Categoria(1,'Menores');

$objE1 = new Equipo("Equipo Uno", "Cap.Uno",1,$catMayores);
$objE2 = new Equipo("Equipo Dos", "Cap.Dos",2,$catMayores);
$objE3 = new Equipo("Equipo Tres", "Cap.Tres",3,$catJuveniles);
$objE4 = new Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);
$objE5 = new Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = new Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);
$objE7 = new Equipo("Equipo Siete", "Cap.Siete",7,$catJuveniles);
$objE8 = new Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);
$objE9 = new Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = new Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);
$objE11 = new Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = new Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);

$objTorneo = new Torneo(100000);

// a
$partido1 = $objTorneo->ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol');
if ($partido1 !== null) {
    $partido1->setCantGolesE1(2);
    $partido1->setCantGolesE2(1);
    echo $partido1;
}
echo "Cantidad de partidos: " . count($objTorneo->getColPartidos()) . "\n";

// b (equipo repetido)
$partido2 = $objTorneo->ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol');
echo $partido2;
echo "Cantidad de partidos: " . count($objTorneo->getColPartidos()) . "\n";

// c
$partido3 = $objTorneo->ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol');
if ($partido3 !== null) {
    $partido3->setCantGolesE1(3);
    $partido3->setCantGolesE2(3);
    echo $partido3;
}
echo "Cantidad de partidos: " . count($objTorneo->getColPartidos()) . "\n";

// d Ganadores basquet
$ganadoresBasquet = $objTorneo->darGanadores('basquet');
echo "Ganadores Basquet:\n";
foreach ($ganadoresBasquet as $ganador) {
    echo $ganador;
}

// e Ganadores futbol
$ganadoresFutbol = $objTorneo->darGanadores('futbol');
echo "Ganadores Futbol:\n";
foreach ($ganadoresFutbol as $ganador) {
    echo $ganador;
}

// f Premios
$premios = [$partido1, $partido2, $partido3];
foreach ($premios as $partido) {
    if ($partido !== null) {
        $premio = $objTorneo->calcularPremioPartido($partido);
        echo "Premio:\n";
        echo "Equipo(s) ganador(es):\n";
        foreach ($premio['equipoGanador'] as $eq) {
            echo $eq;
        }
        echo "Premio total: " . $premio['premioPartido'] . "\n";
    }
}

// g Mostrar torneo
echo $objTorneo;

?>
