<?php

namespace App\Entity;

use App\Interface\StrategyInterface;

class AlwaysDefectiveStrategy implements StrategyInterface
{
    public function chooseAction(array $opponentHistory): string
    {
        return "défection";
    }
}