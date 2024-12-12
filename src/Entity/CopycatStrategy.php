<?php

namespace App\Entity;

use App\Interface\StrategyInterface;

class CopycatStrategy implements StrategyInterface
{
    public function getName(): string
    {
        return 'Copycat';
    }

    public function chooseAction(array $opponentHistory): string
    {
        if (empty($opponentHistory)) {
            return "coopération";
        }
        return end($opponentHistory) === "coopération" ? "coopération" : "défection";
    }
}