<?php

namespace App\Service;

use App\Service\Interface\SupplierInterface;

class SupplierA implements SupplierInterface
{
    /**
     * @param float $shipmentValue
     * @return float
     */
    public function calculateSupplierCost(float $shipmentValue): float
    {
        return 7.5;
    }
}
