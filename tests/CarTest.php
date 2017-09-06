<?php
use PHPUnit\Framework\TestCase;

require_once 'src/Car.php';

/**
  * @covers Spike\Car
  */

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

    /**
     * @dataProvider changeColor
     */
    public function testPainting($newColor, $result)
    {
        $this->assertEquals($newColor, $result);
    }

    public function changeColor(){
        return [
            'paint to red'   => [
                (new Spike\Car(self::COLOR))->paint('red'),
                'Your car is now red'
            ],
            'paint to green'   => [
                (new Spike\Car(self::COLOR))->paint('green'),
                'Your car is now green'
            ],
            'paint to yellow' =>  [
                (new Spike\Car(self::COLOR))->paint('yellow'),
                'Your car is now yellow'
            ],
        ];
    }
}
