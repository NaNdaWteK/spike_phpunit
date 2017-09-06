<?php
namespace Spike;

class Quotation
{
    const API = 'http://api.fixer.io/latest';
    protected $oficial;
    protected $blue;

    public function __construct()
    {
        $data_in = self::API;
        $data_json = @file_get_contents($data_in);
        if(self::hasContent($data_json))
        {
            $data_out = json_decode($data_json, true);
            if(is_array($data_out))
            {
                $this->oficial = $data_out['rates']['USD'];
            }
        }
    }

    public function convertToOficialDolar($price)
    {
        return $price * $this->oficial;
    }

    private function hasContent($data)
    {
        return (strlen($data) > 0);
    }
}
