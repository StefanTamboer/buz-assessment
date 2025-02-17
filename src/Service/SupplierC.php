<?php

namespace App\Service;

use App\Service\Interface\SupplierInterface;

class SupplierC implements SupplierInterface
{
    /**
     * @param float $shipmentValue
     * @return float
     */
    public function calculateSupplierCost(float $shipmentValue): float
    {
        return $shipmentValue <= 100 ? 0.1 * $shipmentValue : 9.5;
    }
}
