<?php

namespace App\Entity;

use App\Interface\StrategyInterface;

class CopycattStrategy implements StrategyInterface
{
    public function chooseAction(array $opponentHistory): string
    {
        if (empty($opponentHistory)) {
            return "coopération";
        }
        return end($opponentHistory) === "coopération" ? "coopération" : "défection";
    }
}