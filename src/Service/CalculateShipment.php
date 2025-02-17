<?php

namespace App\Service;

use App\Service\Interface\SupplierInterface;
use ReflectionClass;
use ReflectionException;

class CalculateShipment
{
    /**
     * @param float $shipmentValue
     * @return float
     * @throws ReflectionException
     */
    public function calculateAllSuppliers(float $shipmentValue): float
    {
        $suppliers = $this->getAllSuppliers();
        $shipmentCost = [];

        foreach ($suppliers as $supplier) {
            /**
             * @var SupplierInterface $supplierClass
             */
            $supplierClass = (new ReflectionClass(
                'App\Service\Supplier' . $supplier->idCode)
            )
                ->newInstance();
            $shipmentCost[] = $supplierClass->calculateSupplierCost($shipmentValue);
        }

        return array_sum($shipmentCost);
    }

    private function getAllSuppliers(): array
    {
        $suppliers[] = (object)['idCode' => 'A', 'name' => 'Leverancier A'];
        $suppliers[] = (object)['idCode' => 'B', 'name' => 'Leverancier B'];
        $suppliers[] = (object)['idCode' => 'C', 'name' => 'Leverancier C'];

        return $suppliers;
    }
}
