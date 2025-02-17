<?php

namespace App\Tests\Unit;

use App\Service\RotateGrid;
use PHPUnit\Framework\TestCase;

class RotateGridTest extends TestCase
{
    public function testRotateRight(): void
    {
        $rotateGrid = new RotateGrid();
        $result = $rotateGrid->rotateRight($this->gridData());

        $this->assertSame($this->gridDataRotatedRight(), $result);
    }

    public function testRotateLeft(): void
    {
        $rotateGrid = new RotateGrid();
        $result = $rotateGrid->rotateLeft($this->gridData());

        $this->assertSame($this->gridDataRotatedLeft(), $result);
    }

    private function gridData(): array
    {
        return [
            [1,2,3],
            [4,5,6],
            [7,8,9],
        ];
    }

    private function gridDataRotatedRight(): array
    {
        return [
            [7,4,1],
            [8,5,2],
            [9,6,3],
        ];
    }

    private function gridDataRotatedLeft(): array
    {
        return [
            [3,6,9],
            [2,5,8],
            [1,4,7],
        ];
    }
}
