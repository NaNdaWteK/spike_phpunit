<?php
namespace Spike;

class Car
{

    public $color;
    public $wheels = 4;

    public function __construct($color = '')
    {
        $this->color = $color;
    }

    public function paint($color)
    {
        $this->color = $color;
        return 'Your car is now ' . $this->color;
    }

}
