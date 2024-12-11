<?php

namespace App\Entity;

class CopycattStrategy extends Strategy
{
    public function chooseAction(array $opponentHistory): string
    {
        if (empty($opponentHistory)) {
            return "coopération";
        }
        return end($opponentHistory) === "coopération" ? "coopération" : "défection";
    }
}