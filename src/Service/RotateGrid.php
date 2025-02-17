<?php

namespace App\Service;

class RotateGrid
{
    /**
     * @return array
     * @var array $grid
     */
    public function rotateRight(array $grid): array
    {
        return array_map(
            fn($row, $column_key) => array_reverse(array_column($grid, $column_key)),
            $grid[0],
            array_keys($grid[0])
        );
    }

    /**
     * @return array
     * @var array $grid
     */
    public function rotateLeft(array $grid): array
    {
        return array_map(
            fn($row, $column_key) => array_column($grid, count($grid[0]) - 1 - $column_key),
            $grid[0],
            array_keys($grid[0])
        );
    }
}
