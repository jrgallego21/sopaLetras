<?php

namespace App\entities;

class ValidarPalabra
{
    public function derecha($palabra, $movimiento, $tablero) // ⟶
    {
        for ($i = 0; $i < strlen($palabra); $i++){
            if ($tablero[$movimiento['fila']][$movimiento['columna']+$i] != Tablero::CARACTER_VACIO) {
                if ($tablero[$movimiento['fila']][$movimiento['columna']+$i] != $palabra[$i]) {
                    return 0;
                }
            }
        }

        return 1;
    }

    public function izquierda($palabra, $movimiento, $tablero) // ⟵
    {
        // d($tablero);
        for ($i = 0; $i < strlen($palabra); $i++){
            if ($tablero[$movimiento['fila']][$movimiento['columna']-$i] != Tablero::CARACTER_VACIO) {
                if ($tablero[$movimiento['fila']][$movimiento['columna']-$i] != $palabra[$i]) {
                    return 0;
                }
            }
        }

        return 1;
    }

    public function arriba($palabra, $movimiento, $tablero) // ￪
    {
        // d($tablero[9][0]);
        for ($i = 0; $i < strlen($palabra); $i++){
            if ($tablero[$movimiento['fila']-$i][$movimiento['columna']] != Tablero::CARACTER_VACIO) {
                if ($tablero[$movimiento['fila']-$i][$movimiento['columna']] != $palabra[$i]) {
                    return 0;
                }
            }
        }

        return 1;
    }

    public function abajo($palabra, $movimiento, $tablero) // ￬
    {
        for ($i = 0; $i < strlen($palabra); $i++){
            if ($tablero[$movimiento['fila']+$i][$movimiento['columna']] != Tablero::CARACTER_VACIO) {
                if ($tablero[$movimiento['fila']+$i][$movimiento['columna']] != $palabra[$i]) {
                    return 0;
                }
            }
        }

        return 1;
    }

    public function diagonalPrincipal($palabra, $movimiento, $tablero) // ↘
    {
        for ($i = 0; $i < strlen($palabra); $i++){
            if ($tablero[$movimiento['fila']+$i][$movimiento['columna']+$i] != Tablero::CARACTER_VACIO) {
                if ($tablero[$movimiento['fila']+$i][$movimiento['columna']+$i] != $palabra[$i]) {
                    return 0;
                }
            }
        }

        return 1;
    }

    public function diagonalPrincipalNegativa($palabra, $movimiento, $tablero) // ↖
    {
        for ($i = 0; $i < strlen($palabra); $i++){
            if ($tablero[$movimiento['fila']-$i][$movimiento['columna']-$i] != Tablero::CARACTER_VACIO) {
                if ($tablero[$movimiento['fila']-$i][$movimiento['columna']-$i] != $palabra[$i]) {
                    return 0;
                }
            }
        }

        return 1;
    }

    public function diagonalInvertida($palabra, $movimiento, $tablero) // ↗
    {
        for ($i = 0; $i < strlen($palabra); $i++){
            if ($tablero[$movimiento['fila']+$i][$movimiento['columna']-$i] != Tablero::CARACTER_VACIO) {
                if ($tablero[$movimiento['fila']+$i][$movimiento['columna']-$i] != $palabra[$i]) {
                    return 0;
                }
            }
        }

        return 1;
    }


    public function diagonalInvertidaNegativa($palabra, $movimiento, $tablero) // ↙
    {
        for ($i = 0; $i < strlen($palabra); $i++){
            if ($tablero[$movimiento['fila']-$i][$movimiento['columna']+$i] != Tablero::CARACTER_VACIO) {
                if ($tablero[$movimiento['fila']-$i][$movimiento['columna']+$i] != $palabra[$i]) {
                    return 0;
                }
            }
        }

        return 1;
    }
}