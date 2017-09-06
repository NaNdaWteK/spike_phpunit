<?php
use PHPUnit\Framework\TestCase;

require_once 'src/Car.php';

final class CarTest extends TestCase
{
    public $car;

    const COLOR = 'black';
    const WHEELS_NUMBER = 4;

    public function setUp()
    {
        $this->car = new Spike\Car(self::COLOR);
    }

    public function testCreateCars()
    {
        $this->assertInstanceOf(
            Spike\Car::class,
            $this->car
        );
    }

    public function testWheelsNumber()
    {
        $this->assertEquals($this->car->wheels, self::WHEELS_NUMBER);
    }
}
