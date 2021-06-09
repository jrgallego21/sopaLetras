<?php

require_once __DIR__.'/../../src/entities/ValidarMovimiento.php';

use PHPUnit\Framework\TestCase;
use App\entities\ValidarMovimiento;

class ValidarMovimientoTest extends TestCase
{
    /** @test */
    public function derecha()
    {
        $validarMovimiento = new ValidarMovimiento(20, 20);
        $this->assertEquals($validarMovimiento->derecha("barco", ["fila" => 0, "columna" => 0]), 1);
        $this->assertEquals($validarMovimiento->derecha("barco", ["fila" => 0, "columna" => 20]), 0);
        $this->assertEquals($validarMovimiento->derecha("barco", ["fila" => 20, "columna" => 0]), 1);
        $this->assertEquals($validarMovimiento->derecha("barco", ["fila" => 20, "columna" => 20]), 0);
        $this->assertEquals($validarMovimiento->derecha("BICICLETA", ["fila" => 5, "columna" => 18]), 0);
        
    }

    /** @test */
    public function izquierda()
    {
        $validarMovimiento = new ValidarMovimiento(20, 20);
        $this->assertEquals($validarMovimiento->izquierda("barco", ["fila" => 0, "columna" => 0]), 0);
        $this->assertEquals($validarMovimiento->izquierda("barco", ["fila" => 0, "columna" => 20]), 1);
        $this->assertEquals($validarMovimiento->izquierda("barco", ["fila" => 20, "columna" => 0]), 0);
        $this->assertEquals($validarMovimiento->izquierda("barco", ["fila" => 20, "columna" => 20]), 1);
    }

    /** @test */
    public function arriba()
    {
        $validarMovimiento = new ValidarMovimiento(20, 20);
        $this->assertEquals($validarMovimiento->arriba("barco", ["fila" => 0, "columna" => 0]), 0);
        $this->assertEquals($validarMovimiento->arriba("barco", ["fila" => 0, "columna" => 20]), 0);
        $this->assertEquals($validarMovimiento->arriba("barco", ["fila" => 20, "columna" => 0]), 1);
        $this->assertEquals($validarMovimiento->arriba("barco", ["fila" => 20, "columna" => 20]), 1);
    }

    /** @test */
    public function abajo()
    {
        $validarMovimiento = new ValidarMovimiento(20, 20);
        $this->assertEquals($validarMovimiento->abajo("barco", ["fila" => 0, "columna" => 0]), 1);
        $this->assertEquals($validarMovimiento->abajo("barco", ["fila" => 0, "columna" => 20]), 1);
        $this->assertEquals($validarMovimiento->abajo("barco", ["fila" => 20, "columna" => 0]), 0);
        $this->assertEquals($validarMovimiento->abajo("barco", ["fila" => 20, "columna" => 20]), 0);
    }

    /** @test */
    public function diagonalPrincipal()
    {
        $validarMovimiento = new ValidarMovimiento(20, 20);
        $this->assertEquals($validarMovimiento->diagonalPrincipal("barco", ["fila" => 0, "columna" => 0]), 1);
        $this->assertEquals($validarMovimiento->diagonalPrincipal("barco", ["fila" => 0, "columna" => 20]), 0);
        $this->assertEquals($validarMovimiento->diagonalPrincipal("barco", ["fila" => 20, "columna" => 0]), 0);
        $this->assertEquals($validarMovimiento->diagonalPrincipal("barco", ["fila" => 20, "columna" => 20]), 0);
    }

    /** @test */
    public function diagonalPrincipalNegativa()
    {
        $validarMovimiento = new ValidarMovimiento(20, 20);
        $this->assertEquals($validarMovimiento->diagonalPrincipalNegativa("barco", ["fila" => 0, "columna" => 0]), 0);
        $this->assertEquals($validarMovimiento->diagonalPrincipalNegativa("barco", ["fila" => 0, "columna" => 20]), 0);
        $this->assertEquals($validarMovimiento->diagonalPrincipalNegativa("barco", ["fila" => 20, "columna" => 0]), 0);
        $this->assertEquals($validarMovimiento->diagonalPrincipalNegativa("barco", ["fila" => 20, "columna" => 20]), 1);
    }

    /** @test */
    public function diagonalInvertida()
    {
        $validarMovimiento = new ValidarMovimiento(20, 20);
        $this->assertEquals($validarMovimiento->diagonalInvertida("barco", ["fila" => 0, "columna" => 0]), 0);
        $this->assertEquals($validarMovimiento->diagonalInvertida("barco", ["fila" => 0, "columna" => 20]), 0);
        $this->assertEquals($validarMovimiento->diagonalInvertida("barco", ["fila" => 20, "columna" => 0]), 1);
        $this->assertEquals($validarMovimiento->diagonalInvertida("barco", ["fila" => 20, "columna" => 20]), 0);
    }

    /** @test */
    public function diagonalInvertidaNegativa()
    {
        $validarMovimiento = new ValidarMovimiento(20, 20);
        $this->assertEquals($validarMovimiento->diagonalInvertidaNegativa("barco", ["fila" => 0, "columna" => 0]), 0);
        $this->assertEquals($validarMovimiento->diagonalInvertidaNegativa("barco", ["fila" => 0, "columna" => 20]), 1);
        $this->assertEquals($validarMovimiento->diagonalInvertidaNegativa("barco", ["fila" => 20, "columna" => 0]), 0);
        $this->assertEquals($validarMovimiento->diagonalInvertidaNegativa("barco", ["fila" => 20, "columna" => 20]), 0);
    }
}