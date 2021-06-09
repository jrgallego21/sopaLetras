<?php

namespace App\entities;

use App\entities\ValidarMovimiento;
use App\entities\ValidarPalabra;
use App\entities\AdicionarPalabra;
use App\entities\Movimiento;

class LlenarTablero
{
    private $tablero;
    private $palabras;
    private $tipoMovimientos;
    private $validarPalabra;
    private $adicionarPalabra;


    public function __construct($tablero, $palabras, $tipoMovimientos)
    {
        $this->validarMoviento = new ValidarMovimiento(count($tablero), count($tablero[0]));
        $this->validarPalabra = new ValidarPalabra();
        $this->adicionarPalabra = new AdicionarPalabra();

        $this->tablero         = $tablero;
        $this->palabras        = $palabras;
        $this->tipoMovimientos = $tipoMovimientos;
    }

    public function getTablero()
    {
        return $this->tablero;
    }

    public function seleccionarMovimiento()
    {
        $fila    = random_int(0, count($this->tablero)-1);
        $columna = random_int(0, count($this->tablero[0])-1);
        $tipoMovimiento = random_int(0, count($this->tipoMovimientos)-1);

        return ["fila" => $fila, "columna" => $columna, "tipoMovimiento" => $this->tipoMovimientos[$tipoMovimiento]];
    }

    public function validarMovientoDerecha($palabra, $movimiento)
    {
        if($this->validarMoviento->derecha($palabra, $movimiento)) {
            if($this->validarPalabra->derecha($palabra, $movimiento, $this->tablero)) {
                $this->tablero = $this->adicionarPalabra->derecha($palabra, $movimiento, $this->tablero);
                return 1;
            }
        }
        return 0;
    }

    public function validarMovientoIzquierda($palabra, $movimiento)
    {
        if($this->validarMoviento->izquierda($palabra, $movimiento)) {
            if($this->validarPalabra->izquierda($palabra, $movimiento, $this->tablero)) {
                $this->tablero = $this->adicionarPalabra->izquierda($palabra, $movimiento, $this->tablero);
                return 1;
            }
        }
        return 0;
    }

    public function validarMovientoArriba($palabra, $movimiento)
    {
        if($this->validarMoviento->arriba($palabra, $movimiento)) {
            if($this->validarPalabra->arriba($palabra, $movimiento, $this->tablero)) {
                $this->tablero = $this->adicionarPalabra->arriba($palabra, $movimiento, $this->tablero);
                return 1;
            }
        }
        return 0;
    }

    public function validarMovientoAbajo($palabra, $movimiento)
    {
        if($this->validarMoviento->abajo($palabra, $movimiento)) {
            if($this->validarPalabra->abajo($palabra, $movimiento, $this->tablero)) {
                $this->tablero = $this->adicionarPalabra->abajo($palabra, $movimiento, $this->tablero);
                return 1;
            }
        }
        return 0;
    }

    public function validarMovientoDiagonalPrincipal($palabra, $movimiento)
    {
        if($this->validarMoviento->diagonalPrincipal($palabra, $movimiento)) {
            if($this->validarPalabra->diagonalPrincipal($palabra, $movimiento, $this->tablero)) {
                $this->tablero = $this->adicionarPalabra->diagonalPrincipal($palabra, $movimiento, $this->tablero);
                return 1;
            }
        }
        return 0;
    }

    public function validarMovientoDiagonalPrincipalNegativa($palabra, $movimiento)
    {
        if($this->validarMoviento->diagonalPrincipalNegativa($palabra, $movimiento)) {
            if($this->validarPalabra->diagonalPrincipalNegativa($palabra, $movimiento, $this->tablero)) {
                $this->tablero = $this->adicionarPalabra->diagonalPrincipalNegativa($palabra, $movimiento, $this->tablero);
                return 1;
            }
        }
        return 0;
    }

    public function validarMovientoDiagonalInvertida($palabra, $movimiento)
    {
        if($this->validarMoviento->diagonalInvertida($palabra, $movimiento)) {
            if($this->validarPalabra->diagonalInvertida($palabra, $movimiento, $this->tablero)) {
                $this->tablero = $this->adicionarPalabra->diagonalInvertida($palabra, $movimiento, $this->tablero);
                return 1;
            }
        }
        return 0;
    }

    public function validarMovientoDiagonalInvertidaNegativa($palabra, $movimiento)
    {
        if($this->validarMoviento->diagonalInvertidaNegativa($palabra, $movimiento)) {
            if($this->validarPalabra->diagonalInvertidaNegativa($palabra, $movimiento, $this->tablero)) {
                $this->tablero = $this->adicionarPalabra->diagonalInvertidaNegativa($palabra, $movimiento, $this->tablero);
                return 1;
            }
        }
        return 0;
    }

    public function llenarTablero()
    {
        foreach ($this->palabras as $palabra) {
            $banderaMovimiento = 0;
            while($banderaMovimiento == 0) {
                $banderaMovimiento = $this->llenarPalabra($palabra);
            }
        }
    }

    public function llenarPalabra($palabra)
    {
        $tipoMovimiento = new TipoMovimiento();
        $movimiento     = new Movimiento(count($this->tablero), count($this->tablero[0]), $tipoMovimiento->getTipoMovimientos());

        return $this->seleccionarTipoMovimiento($palabra, $movimiento->generarMovimiento());
    }

    public function seleccionarTipoMovimiento($palabra, $movimiento)
    {
        switch(strtolower($movimiento['tipoMovimiento'])){
            case 'derecha':
                return $this->validarMovientoDerecha($palabra, $movimiento);
            case 'izquierda':
                return $this->validarMovientoIzquierda($palabra, $movimiento);
            case 'arriba':
                var_dump('arriba');
                return $this->validarMovientoArriba($palabra, $movimiento);
            case 'abajo':
                return $this->validarMovientoAbajo($palabra, $movimiento);
            case 'diagonal_principal':
                return $this->validarMovientoDiagonalPrincipal($palabra, $movimiento);
            case 'diagonal_principal_negativa':
                return $this->validarMovientoDiagonalPrincipalNegativa($palabra, $movimiento);
            case 'diagonal_invertida':
                return $this->validarMovientoDiagonalInvertida($palabra, $movimiento);
            case 'diagonal_invertida_negatica':
                return $this->validarMovientoDiagonalInvertidaNegativa($palabra, $movimiento);
            default:
                return 0;
        }
    }
}