<?php

namespace App\entities;

class Palabra
{
    private $ruta;
    private $palabras;

    public function __construct()
    {
        $this->ruta = "public/resources/palabras.json";
        $this->buscarPalabras();
    }

    public function getPalabras()
    {
        return $this->palabras;
    }

    public function setPalabras($palabras)
    {
        $this->palabras = $palabras;
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    public function setRuta($ruta)
    {
        $this->ruta = $ruta;
    }

    public function buscarPalabras()
    {
        $json = new UtilidadesJson($this->ruta);
        $this->palabras = $json->getContenido();
        $this->convertirPalabrasAMayusculas();
    }

    public function convertirPalabrasAMayusculas()
    {
        for ($i = 0; $i < count($this->palabras); $i++) {
            $this->palabras[$i] = strtoupper($this->palabras[$i]);
        }
    }

    public function mostrarPalabrasHtml()
    {
        $palabraHtml = '<br><b>Palabras a buscar</b>: [';

        for ($i = 0; $i < count($this->palabras); $i++) {
            $palabraHtml .= strtolower($this->palabras[$i]).', ';
        }

        $palabraHtml = substr($palabraHtml, 0, -2);

        $palabraHtml .= ']';

        return $palabraHtml;
    }
}