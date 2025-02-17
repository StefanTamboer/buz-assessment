<?php

namespace App\Service\Interface;

interface SupplierInterface
{
    public function calculateSupplierCost(float $shipmentValue): float;
}
