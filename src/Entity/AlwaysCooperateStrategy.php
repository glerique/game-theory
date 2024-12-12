<?php

namespace App\Entity;

use App\Interface\StrategyInterface;

class AlwaysCooperateStrategy implements StrategyInterface
{
    public function getName(): string
    {
        return 'Coopération';
    }

    public function chooseAction(array $opponentHistory): string
    {
        return "coopération";
    }
}