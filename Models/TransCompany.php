<?php

namespace Models;

use Interfaces\Carrier;

class TransCompany implements Carrier
{
    public function calculateCost(int $weight) {
        return ($weight <= 10) ? 20 : 100;
    }

}