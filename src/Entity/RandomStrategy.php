<?php

namespace App\Entity;

use App\Interface\StrategyInterface;

class RandomStrategy implements StrategyInterface
{
    public function getName(): string
    {
        return 'Random';
    }

    public function chooseAction(array $opponentHistory): string
    {
        return rand(0, 1) === 0 ? "coopération" : "défection";
    }
}