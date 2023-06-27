<?php

namespace Models;

use Interfaces\Carrier;

class PackGroup implements Carrier
{
    public function calculateCost(int $weight) {
        return $weight;
    }
}