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
    public function testPainting($carObject, $result)
    {
        $strResult = self::invokePrivateMethod($carObject, 'paint', ['red']);

        $this->assertEquals($strResult, $result);
    }

    public function testToDolars()
    {
        $this->assertEquals($this->car->dolars, self::MOCKED_DOLARS);
    }

    public function changeColor(){

        $mockQuotation = Mockery::mock(new Spike\Quotation);

        return [
            'paint to red'   => [
                (new Spike\Car(self::COLOR, self::PRICE, $mockQuotation)),
                'Your car is now red'
            ]
        ];
    }

    private function invokePrivateMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);
        return $method->invokeArgs($object, $parameters);
    }
}
