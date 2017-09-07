<?php
namespace Spike;

class Quotation
{
    const API = 'http://api.fixer.io/latest';
    protected $dolar;

    public function __construct()
    {
        $data_in = self::API;
        $data_json = @file_get_contents($data_in);
        self::dolarize($data_json);
    }

    public function convertToOficialDolar($price)
    {
        return $price * $this->dolar;
    }

    private function dolarize($json)
    {
        if(self::hasContent($json))
        {
            $data_out = json_decode($json, true);
            self::setDolar($data_out);
        }
    }

    private function setDolar($data)
    {
        if(is_array($data))
        {
            $this->dolar = $data['rates']['USD'];
        }
    }

    private function hasContent($data)
    {
        return (strlen($data) > 0);
    }
}
