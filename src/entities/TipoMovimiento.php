<?php

namespace App\entities;

class TipoMovimiento
{
    private $ruta;
    private $tipoMovimientos;

    public function __construct()
    {
        $this->ruta = "public/resources/tipo_movimiento.json";
        $this->buscarTipoMovimiento();
    }

    public function getTipoMovimientos()
    {
        return $this->tipoMovimientos;
    }

    public function setTipoMovimientos($tipoMovimientos)
    {
        $this->tipoMovimientos = $tipoMovimientos;
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    public function setRuta($ruta)
    {
        $this->ruta = $ruta;
    }

    public function buscarTipoMovimiento()
    {
        $json = new UtilidadesJson($this->ruta);
        $this->tipoMovimientos = $json->getContenido();
    }
}