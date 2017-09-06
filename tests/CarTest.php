<?php
use PHPUnit\Framework\TestCase;

require 'vendor/autoload.php';
require_once 'src/Car.php';

final class CarTest extends TestCase
{
    public $car;

    const COLOR = 'black';
    const PRICE = 16000;
    const MOCKED_DOLARS = 15000;
    const WHEELS_NUMBER = 4;

    public function setUp()
    {
        $mockQuotation = Mockery::mock(new Spike\Quotation);
        $mockQuotation->shouldReceive('convertToOficialDolar')->with(self::PRICE)->andReturn(self::MOCKED_DOLARS);

        $this->car = new Spike\Car(self::COLOR, self::PRICE, $mockQuotation);
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

    public function testToDolars()
    {
        $this->assertEquals($this->car->dolars, self::MOCKED_DOLARS);
    }

    public function changeColor(){

        $mockQuotation = Mockery::mock(new Spike\Quotation);

        return [
            'paint to red'   => [
                (new Spike\Car(self::COLOR, self::PRICE, $mockQuotation))->paint('red'),
                'Your car is now red'
            ],
            'paint to green'   => [
                (new Spike\Car(self::COLOR, self::PRICE, $mockQuotation))->paint('green'),
                'Your car is now green'
            ],
            'paint to yellow' =>  [
                (new Spike\Car(self::COLOR, self::PRICE, $mockQuotation))->paint('yellow'),
                'Your car is now yellow'
            ],
        ];
    }
}
