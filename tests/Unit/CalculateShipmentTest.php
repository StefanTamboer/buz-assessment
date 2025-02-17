<?php

namespace App\Tests\Unit;

use App\Service\CalculateShipment;
use PHPUnit\Framework\TestCase;

class CalculateShipmentTest extends TestCase
{
    /**
     * @throws \ReflectionException
     */
    public function testCalculateAllSuppliers()
    {
        $calculate = new CalculateShipment();
        $result = $calculate->calculateAllSuppliers(5);

        $this->assertEquals(13.0, $result);
    }
}
