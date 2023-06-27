<?php
namespace Interfaces;

interface Carrier {
    public function calculateCost(int $weight);
}