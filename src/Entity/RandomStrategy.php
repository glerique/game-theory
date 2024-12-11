<?php

namespace App\Entity;

class RandomStrategy extends Strategy
{
    public function chooseAction(array $opponentHistory): string
    {
        return rand(0, 1) === 0 ? "coopération" : "défection";
    }
}