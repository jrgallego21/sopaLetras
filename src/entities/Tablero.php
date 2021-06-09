<?php

namespace App\entities;

class Tablero
{
    const CARACTER_VACIO = '-';

    private $fila;
    private $columna;
    private $tablero;

    public function __construct($parametros = array())
    {
        if (!empty($parametros)) {
            $this->fila     = $parametros[0];
            $this->columna  = $parametros[1];
        }

        $this->iniciarTablero();
    }

    public function getFila()
    {
        return $this->fila;
    }

    public function setFila($fila)
    {
        $this->fila = $fila;
    }

    public function getColumna()
    {
        return $this->columna;
    }

    public function setColumna($columna)
    {
        $this->columna = $columna;
    }

    public function getTablero()
    {
        return $this->tablero;
    }

    public function setTablero($tablero)
    {
        $this->tablero = $tablero;
    }

    public function iniciarTablero()
    {
        for ($i = 0; $i < $this->fila; $i++) {
            for ($j = 0; $j < $this->columna; $j++) {
                $this->tablero[$i][$j] = Tablero::CARACTER_VACIO;
            }
        }
    }

    public function mostrarTablero()
    {
        for ($i = 0; $i < $this->fila; $i++) {
            for ($j = 0; $j < $this->columna; $j++) {
                echo $this->tablero[$i][$j].'&nbsp;&nbsp;&nbsp;&nbsp;';
            }
            echo '<br>';
        }
    }

    public function mostrarTableroHtml()
    {
        $tablaHml = '<h1 align="center">Sopa de Letas</h1>';
        $tablaHml .= '<table width="70%" border="1px" align="center">';

        for ($i = 0; $i < $this->fila; $i++) {
            $tablaHml .= '<tr>';
            for ($j = 0; $j < $this->columna; $j++) {
                $tablaHml .= "<td align='center'>{$this->tablero[$i][$j]}</td>";
            }
            $tablaHml .= '</tr>';
        }


        $tablaHml .= '</table>';

        return $tablaHml;
    }

    public function completarTableroAletaoriamente()
    {
        for ($i = 0; $i < $this->fila; $i++) {
            for ($j = 0; $j < $this->columna; $j++) {
                if ($this->tablero[$i][$j] == Tablero::CARACTER_VACIO) {
                    $this->tablero[$i][$j] = $this->generarCaracterAleatorio();
                }
            }
        }
    }

    public function generarCaracterAleatorio()
    {
        $caracteresPermitidos = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return $caracteresPermitidos[random_int(0, strlen($caracteresPermitidos)-1)];
    }
}