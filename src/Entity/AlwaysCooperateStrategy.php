<?php

namespace App\Entity;

use App\Interface\StrategyInterface;

class AlwaysCooperateStrategy implements StrategyInterface
{
    public function chooseAction(array $opponentHistory): string
    {
        return "coopération";
    }
}