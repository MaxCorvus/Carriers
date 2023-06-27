<?php

namespace Models;

use Repositories\CarrierRepository;
use Exception;
use Models\TransCompany;
use Models\PackGroup;

class TransportServiceCalculator
{
   public $carrierRepository;

   public function __construct(
       CarrierRepository $carrierRepository
   ) {
       $this->carrierRepository = $carrierRepository;
   }

    public function calculatePrice($weight, $carrierSlug) {
        if ($this->carrierRepository->getCarrier($carrierSlug) == null) {
            throw new Exception('Invalid carrier slug');
        }
        $carrierClass = $this->carrierRepository->getCarrier($carrierSlug);
        $cost = $carrierClass->calculateCost($weight);
        return $cost;

    }
}