<?php

namespace App\Service;

use App\Service\Interface\SupplierInterface;

class SupplierB implements SupplierInterface
{
    /**
     * @param float $shipmentValue
     * @return float
     */
    public function calculateSupplierCost(float $shipmentValue): float
    {
        return max([0.03 * $shipmentValue, 5.0]);
    }
}
