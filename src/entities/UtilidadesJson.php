<?php

namespace App\entities;

class UtilidadesJson
{
    private $ruta;
    private $contenido;

    public function __construct($ruta)
    {
        // $this->ruta = "public/resources/palabras.json";
        $this->ruta = $ruta;
        $this->leerArchivo();

        // $this->contenido = [];
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    public function setRuta($ruta)
    {
        $this->ruta = $ruta;
    }

    public function getContenido()
    {
        return $this->contenido;
    }

    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    }

    public function crearArchivo()
    {
        $json_string = json_encode($this->contenido);
        file_put_contents($this->ruta, $json_string);
    }

    public function leerArchivo()
    {
        $datos_clientes  = file_get_contents($this->ruta);
        $this->contenido = json_decode($datos_clientes, true);
    }

    public function mostrarArchivo()
    {
        foreach ($this->contenido as $registro) {
            echo $registro."<br>";
        }
    }
}