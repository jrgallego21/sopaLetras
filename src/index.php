<?php

require_once '../vendor/autoload.php';

use App\entities\Tablero;
use App\entities\Palabra;
use App\entities\TipoMovimiento;
use App\entities\LlenarTablero;

$tablero = new Tablero([25, 20]);
$palabras = new Palabra();
$tipoMovimientos = new TipoMovimiento();
$llenarTablero = new LlenarTablero($tablero->getTablero(), $palabras->getPalabras(), $tipoMovimientos->getTipoMovimientos());

$llenarTablero->llenarTablero();

d($llenarTablero);

$tablero->setTablero($llenarTablero->getTablero());

// $tablero->mostrarTablero();

$tablero->completarTableroAletaoriamente();
echo $tablero->mostrarTableroHtml();
echo $palabras->mostrarPalabrasHtml();
// $tablero->mostrarTablero();


echo '<br>Hola Mundo';
