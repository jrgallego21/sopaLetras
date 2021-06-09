<?php

namespace App\entities;

class AdicionarPalabra
{
    public function derecha($palabra, $movimiento, $tablero) // ⟶
    {
        for ($i = 0; $i < strlen($palabra); $i++) {
            $tablero[$movimiento['fila']][$movimiento['columna']+$i] = $palabra[$i];
        }

        return $tablero;
    }

    public function izquierda($palabra, $movimiento, $tablero) // ⟵
    {
        for ($i = 0; $i < strlen($palabra); $i++) {
            $tablero[$movimiento['fila']][$movimiento['columna']-$i] = $palabra[$i];
        }

        return $tablero;
    }

    public function arriba($palabra, $movimiento, $tablero) // ￪
    {
        for ($i = 0; $i < strlen($palabra); $i++) {
            $tablero[$movimiento['fila']-$i][$movimiento['columna']] = $palabra[$i];
        }

        return $tablero;
    }

    public function abajo($palabra, $movimiento, $tablero) // ￬
    {
        for ($i = 0; $i < strlen($palabra); $i++) {
            $tablero[$movimiento['fila']+$i][$movimiento['columna']] = $palabra[$i];
        }

        return $tablero;
    }

    public function diagonalPrincipal($palabra, $movimiento, $tablero) // ↘
    {
        for ($i = 0; $i < strlen($palabra); $i++) {
            $tablero[$movimiento['fila']+$i][$movimiento['columna']+$i] = $palabra[$i];
        }

        return $tablero;
    }

    public function diagonalPrincipalNegativa($palabra, $movimiento, $tablero) // ↖
    {
        for ($i = 0; $i < strlen($palabra); $i++) {
            $tablero[$movimiento['fila']-$i][$movimiento['columna']-$i] = $palabra[$i];
        }

        return $tablero;
    }

    public function diagonalInvertida($palabra, $movimiento, $tablero) // ↗
    {
        for ($i = 0; $i < strlen($palabra); $i++) {
            $tablero[$movimiento['fila']+$i][$movimiento['columna']-$i] = $palabra[$i];
        }

        return $tablero;
    }


    public function diagonalInvertidaNegativa($palabra, $movimiento, $tablero) // ↙
    {
        for ($i = 0; $i < strlen($palabra); $i++) {
            $tablero[$movimiento['fila']-$i][$movimiento['columna']+$i] = $palabra[$i];
        }

        return $tablero;
    }
}