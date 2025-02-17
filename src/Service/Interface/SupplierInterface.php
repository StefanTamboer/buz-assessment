<?php

namespace App\Service\Interface;

interface SupplierInterface
{
    /**
     * @param float $shipmentValue
     * @return float
     */
    public function calculateSupplierCost(float $shipmentValue): float;
}
