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
$objE2 = new Equipo("Equipo Dos", "Cap.Dos",1,$catMayores);
$objE3 = new Equipo("Equipo Tres", "Cap.Tres",1,$catJuveniles);
$objE4 = new Equipo("Equipo Cuatro", "Cap.Cuatro",1,$catJuveniles);
$objE5 = new Equipo("Equipo Cinco", "Cap.Cinco",1,$catMayores);
$objE6 = new Equipo("Equipo Seis", "Cap.Seis",1,$catMayores);
$objE7 = new Equipo("Equipo Siete", "Cap.Siete",1,$catJuveniles);
$objE8 = new Equipo("Equipo Ocho", "Cap.Ocho",1,$catJuveniles);
$objE9 = new Equipo("Equipo Nueve", "Cap.Nueve",1,$catMenores);
$objE10 = new Equipo("Equipo Diez", "Cap.Diez",1,$catMenores);
$objE11 = new Equipo("Equipo Once", "Cap.Once",1,$catMayores);
$objE12 = new Equipo("Equipo Doce", "Cap.Doce",1,$catMayores);

$objTorneo = new Torneo(100000);

// a
$partido1 = $objTorneo->ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol');
if ($partido1 !== null) {
    $partido1->setCantGolesE1(2);
    $partido1->setCantGolesE2(1);
    echo $partido1;
}
echo "Cantidad de partidos: " . count($objTorneo->getColPartidos()) . "\n";

// b
$partido2 = $objTorneo->ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol');
if ($partido2 !== null) {
    $partido2->setCantGolesE1(1);
    $partido2->setCantGolesE2(1);
    echo $partido2;
}
echo "Cantidad de partidos: " . count($objTorneo->getColPartidos()) . "\n";

// c
$partido3 = $objTorneo->ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol');
if ($partido3 !== null) {
    $partido3->setCantGolesE1(3);
    $partido3->setCantGolesE2(3);
    echo $partido3;
}
echo "Cantidad de partidos: " . count($objTorneo->getColPartidos()) . "\n";

// darGanadores basquet
echo "Ganadores Basquet:\n";
$ganadoresBasquet = $objTorneo->darGanadores('basquet');
foreach ($ganadoresBasquet as $ganador) {
    echo $ganador;
}

// darGanadores futbol
echo "Ganadores Futbol:\n";
$ganadoresFutbol = $objTorneo->darGanadores('futbol');
foreach ($ganadoresFutbol as $ganador) {
    echo $ganador;
}

// calcularPremioPartido
$partidos = [$partido1, $partido2, $partido3];
foreach ($partidos as $p) {
    if ($p !== null) {
        $premio = $objTorneo->calcularPremioPartido($p);
        echo "Premio:\n";
        echo "Equipo(s) ganador(es):\n";
        foreach ($premio['equipoGanador'] as $eq) {
            echo $eq;
        }
        echo "Premio total: " . $premio['premioPartido'] . "\n";
    }
}

// Mostrar torneo
echo $objTorneo;

// Partidos tabla oficial
$b1 = $objTorneo->ingresarPartido($objE7, $objE8, '2024-05-05', 'basquetbol');
if ($b1 !== null) {
    $b1->setCantGolesE1(80);
    $b1->setCantGolesE2(120);
    echo $b1;
}

$b2 = $objTorneo->ingresarPartido($objE9, $objE10, '2024-05-06', 'basquetbol');
if ($b2 !== null) {
    $b2->setCantGolesE1(81);
    $b2->setCantGolesE2(110);
    echo $b2;
}

$b3 = $objTorneo->ingresarPartido($objE11, $objE12, '2024-05-07', 'basquetbol');
if ($b3 !== null) {
    $b3->setCantGolesE1(115);
    $b3->setCantGolesE2(85);
    echo $b3;
}

$f1 = $objTorneo->ingresarPartido($objE1, $objE2, '2024-05-07', 'futbol');
if ($f1 !== null) {
    $f1->setCantGolesE1(3);
    $f1->setCantGolesE2(2);
    echo $f1;
}

$f2 = $objTorneo->ingresarPartido($objE3, $objE4, '2024-05-08', 'futbol');
if ($f2 !== null) {
    $f2->setCantGolesE1(0);
    $f2->setCantGolesE2(1);
    echo $f2;
}

$f3 = $objTorneo->ingresarPartido($objE5, $objE6, '2024-05-09', 'futbol');
if ($f3 !== null) {
    $f3->setCantGolesE1(2);
    $f3->setCantGolesE2(3);
    echo $f3;
}
?>
