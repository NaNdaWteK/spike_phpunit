<?php
namespace Spike;

require_once 'Quotation.php';

class Car
{

    public $color;
    public $dolars;
    public $euros;
    public $wheels = 4;

    public function __construct($color = '', $euros, Quotation $quotation)
    {
        $this->color = $color;
        $this->euros = $euros;
        $this->dolars = $quotation->convertToOficialDolar($euros);
    }

    public function paint($color)
    {
        $this->color = $color;
        return 'Your car is now ' . $this->color;
    }

}
