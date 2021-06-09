<?php

require_once __DIR__.'/../../src/entities/Tablero.php';

use PHPUnit\Framework\TestCase;
use App\entities\Tablero;

class TableroTest extends TestCase
{
    /** @test */
    public function iniciarTablero()
    {
        $tablero = new Tablero([2, 2]);

        $this->assertEquals($tablero->getTablero(),
                            [[Tablero::CARACTER_VACIO, Tablero::CARACTER_VACIO],
                            [Tablero::CARACTER_VACIO, Tablero::CARACTER_VACIO]
                            ]);
    }

    /** @test */
    public function generarCaracterAleatorio()
    {
        $this->assertEquals(1, 1);
    }
}