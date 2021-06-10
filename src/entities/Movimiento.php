<?php

namespace App\entities;

class Movimiento
{
    private $ruta;
    private $valorMaximofila;
    private $valorMaximocolumna;
    private $tipoMovimiento;

    public function __construct($valorMaximoFila, $valorMaximoColumna, $tipoMovimiento)
    {
        // var_dump($tipoMovimiento);
        $this->valorMaximofila    = $valorMaximoFila;
        $this->valorMaximocolumna = $valorMaximoColumna;
        $this->tipoMovimiento     = $tipoMovimiento;

        // $this->buscarTipoMovimientos();
    }

    public function getTipoMovimiento()
    {
        return $this->tipoMovimiento;
    }

    public function buscarTipoMovimientos()
    {
        $json = new UtilidadesJson($this->ruta);
        $this->tipoMovimiento = $json->getContenido();
    }

    public function generarMovimiento()
    {
        $fila    = random_int(0, $this->valorMaximofila-1);
        $columna = random_int(0, $this->valorMaximocolumna-1);
        $tipoMovimiento = random_int(0, count($this->tipoMovimiento)-1);

        return ["fila" => $fila, "columna" => $columna, "tipoMovimiento" => $this->tipoMovimiento[$tipoMovimiento]];
    }
}