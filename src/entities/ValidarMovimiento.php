<?php

namespace App\entities;

class ValidarMovimiento
{
    private $fila;
    private $columna;

    public function __construct($fila, $columna)
    {
        $this->fila    = $fila;
        $this->columna = $columna;
    }

    public function derecha($palabra, $movimiento) // ⟶
    {
        return $movimiento['columna'] + strlen($palabra) <= $this->columna ? 1: 0;
    }

    public function izquierda($palabra, $movimiento) // ⟵
    {
        return $movimiento['columna'] - strlen($palabra) >= 0 ? 1: 0;
    }

    public function arriba($palabra, $movimiento) // ￪
    {
        return $movimiento['fila'] - strlen($palabra) >= 0 ? 1: 0;
    }

    public function abajo($palabra, $movimiento) // ￬
    {
        return $movimiento['fila'] + strlen($palabra) <= $this->fila ? 1: 0;
    }

    public function diagonalPrincipal($palabra, $movimiento) // ↘
    {
        return $this->derecha($palabra, $movimiento) && $this->abajo($palabra, $movimiento) ? 1: 0;
    }

    public function diagonalPrincipalNegativa($palabra, $movimiento) // ↖
    {
        return $this->izquierda($palabra, $movimiento) && $this->arriba($palabra, $movimiento) ? 1: 0;
    }

    public function diagonalInvertida($palabra, $movimiento) // ↗
    {
        return $this->derecha($palabra, $movimiento) && $this->arriba($palabra, $movimiento) ? 1: 0;
    }


    public function diagonalInvertidaNegativa($palabra, $movimiento) // ↙
    {
        return $this->izquierda($palabra, $movimiento) && $this->abajo($palabra, $movimiento) ? 1: 0;
    }
}