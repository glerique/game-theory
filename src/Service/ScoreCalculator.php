<?php

namespace App\Service;

class ScoreCalculator
{
    public function calculate(string $choice1, string $choice2): array
    {
        $points = [
            'coopération' => ['coopération' => [3, 3], 'défection' => [0, 5]],
            'défection' => ['coopération' => [5, 0], 'défection' => [1, 1]]
        ];

        return $points[$choice1][$choice2];
    }
}