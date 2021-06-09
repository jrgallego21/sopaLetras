<?php

require_once __DIR__.'/../../src/entities/ValidarMovimiento.php';

use PHPUnit\Framework\TestCase;
use App\entities\Tablero;
use App\entities\ValidarPalabra;

class ValidarPalabraTest extends TestCase
{
    public $tableroInicial = [
        ['-', '-', '-', '-', '-', '-', '-', '-', '-', '-'],
        ['-', '-', '-', '-', '-', '-', '-', '-', '-', '-'],
        ['-', '-', '-', '-', '-', '-', '-', '-', '-', '-'],
        ['-', '-', '-', '-', '-', '-', '-', '-', '-', '-'],
        ['-', '-', '-', '-', '-', '-', '-', '-', '-', '-'],
        ['-', '-', '-', '-', '-', '-', '-', '-', '-', '-'],
        ['-', '-', '-', '-', '-', '-', '-', '-', '-', '-'],
        ['-', '-', '-', '-', '-', '-', '-', '-', '-', '-'],
        ['-', '-', '-', '-', '-', '-', '-', '-', '-', '-'],
        ['-', '-', '-', '-', '-', '-', '-', '-', '-', '-']
    ];

    public $tableroConDatos = [
        ['C', '-', '-', '-', 'O', '-', 'R', 'R', '-', 'C'],
        ['A', '-', '-', '-', 'S', '-', '-', '-', '-', '-'],
        ['S', '-', 'R', '-', 'O', '-', '-', '-', '-', '-'],
        ['A', '-', '-', '-', '-', '-', '-', '-', '-', '-'],
        ['-', '-', '-', '-', '-', '-', '-', '-', '-', '-'],
        ['O', '-', '-', '-', '-', 'O', '-', '-', '-', '-'],
        ['-', '-', '-', '-', '-', '-', 'R', '-', '-', '-'],
        ['-', '-', '-', '-', '-', '-', '-', 'R', '-', '-'],
        ['-', '-', '-', '-', '-', '-', '-', '-', 'A', '-'],
        ['C', '-', '-', '-', '-', '-', '-', '-', '-', 'C']
    ];

    /** @test */
    public function derecha()
    {
        $validarPalabra = new ValidarPalabra();
        $this->assertEquals($validarPalabra->derecha("CARRO", ["fila" => 0, "columna" => 0], $this->tableroInicial), 1);
        $this->assertEquals($validarPalabra->derecha("C", ["fila" => 0, "columna" => 0], $this->tableroConDatos), 1);
        $this->assertEquals($validarPalabra->derecha("TARRO", ["fila" => 0, "columna" => 0], $this->tableroConDatos), 0);
    }

    /** @test */
    public function izquierda()
    {
        $validarPalabra = new ValidarPalabra();
        $this->assertEquals($validarPalabra->izquierda("CARRO", ["fila" => 0, "columna" => 9], $this->tableroInicial), 1);
        $this->assertEquals($validarPalabra->izquierda("CARRO", ["fila" => 0, "columna" => 9], $this->tableroConDatos), 1);
        $this->assertEquals($validarPalabra->izquierda("CARGO", ["fila" => 0, "columna" => 9], $this->tableroConDatos), 0);
    }

    /** @test */
    public function arriba()
    {
        $validarPalabra = new ValidarPalabra();
        $this->assertEquals($validarPalabra->arriba("CARRO", ["fila" => 9, "columna" => 0], $this->tableroInicial), 1);
        $this->assertEquals($validarPalabra->arriba("CARRO", ["fila" => 9, "columna" => 0], $this->tableroConDatos), 1);
        $this->assertEquals($validarPalabra->arriba("TARRO", ["fila" => 9, "columna" => 0], $this->tableroConDatos), 0);
    }

    /** @test */
    public function abajo()
    {
        $validarPalabra = new ValidarPalabra();
        $this->assertEquals($validarPalabra->abajo("CARRO", ["fila" => 0, "columna" => 0], $this->tableroInicial), 1);
        $this->assertEquals($validarPalabra->abajo("CARRO", ["fila" => 0, "columna" => 9], $this->tableroConDatos), 1);
        $this->assertEquals($validarPalabra->abajo("TARRO", ["fila" => 0, "columna" => 9], $this->tableroConDatos), 0);
    }

    /** @test */
    public function diagonalPrincipal()
    {
        $validarPalabra = new ValidarPalabra();
        $this->assertEquals($validarPalabra->diagonalPrincipal("CARRO", ["fila" => 0, "columna" => 0], $this->tableroInicial), 1);
        $this->assertEquals($validarPalabra->diagonalPrincipal("CARRO", ["fila" => 0, "columna" => 0], $this->tableroConDatos), 1);
        $this->assertEquals($validarPalabra->diagonalPrincipal("TARRO", ["fila" => 0, "columna" => 9], $this->tableroConDatos), 0);
    }

    /** @test */
    public function diagonalPrincipalNegativa()
    {
        $validarPalabra = new ValidarPalabra();
        $this->assertEquals($validarPalabra->diagonalPrincipalNegativa("CARRO", ["fila" => 9, "columna" => 9], $this->tableroInicial), 1);
        $this->assertEquals($validarPalabra->diagonalPrincipalNegativa("CARRO", ["fila" => 9, "columna" => 9], $this->tableroConDatos), 1);
        $this->assertEquals($validarPalabra->diagonalPrincipalNegativa("TARRO", ["fila" => 9, "columna" => 9], $this->tableroConDatos), 0);
    }

    /** @test */
    public function diagonalInvertida()
    {
        $validarPalabra = new ValidarPalabra();
        $this->assertEquals($validarPalabra->diagonalInvertida("CARRO", ["fila" => 0, "columna" => 9], $this->tableroInicial), 1);
        $this->assertEquals($validarPalabra->diagonalInvertida("CARRO", ["fila" => 0, "columna" => 9], $this->tableroConDatos), 1);
        $this->assertEquals($validarPalabra->diagonalInvertida("TARRO", ["fila" => 0, "columna" => 9], $this->tableroConDatos), 0);
    }

    /** @test */
    public function diagonalInvertidaNegativa()
    {
        $validarPalabra = new ValidarPalabra();
        $this->assertEquals($validarPalabra->diagonalInvertidaNegativa("CARRO", ["fila" => 9, "columna" => 0], $this->tableroInicial), 1);
        $this->assertEquals($validarPalabra->diagonalInvertidaNegativa("CARRO", ["fila" => 9, "columna" => 0], $this->tableroConDatos), 1);
        $this->assertEquals($validarPalabra->diagonalInvertidaNegativa("TARRO", ["fila" => 9, "columna" => 0], $this->tableroConDatos), 0);
    }
}