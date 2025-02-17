<?php

namespace App\Service;

class RotateGrid
{
    /**
     * @var array $grid
     * @return array
     */
    public function rotateRight(array $grid): array
    {
        return array_map(function($row, $column_key) use ($grid){
            return array_reverse(array_column($grid, $column_key));
        }, $grid[0], array_keys($grid[0]));
    }

    /**
     * @var array $grid
     * @return array
     */
    public function rotateLeft(array $grid): array
    {
        return array_map(function($row, $column_key) use ($grid){
            return array_column($grid, count($grid[0]) - 1 -$column_key);
        }, $grid[0], array_keys($grid[0]));
    }
}
