<?php

namespace Repositories;

use Interfaces\Carrier;
use Models\PackGroup;
use Models\TransCompany;

class CarrierRepository
{
    public $carriers = [];

    public function registerCarrier($carrierSlug, Carrier $carrierClass) {
        $this->carriers[$carrierSlug] = $carrierClass;
    }
    public function getCarrier($carrierSlug) {
        if (isset($this->carriers[$carrierSlug])) {
            return $this->carriers[$carrierSlug];

        }
        return null;
    }
}