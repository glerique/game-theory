<?php

namespace App\Entity;

class AlwaysCooperateStrategy extends Strategy
{
    public function chooseAction(array $opponentHistory): string
    {
        return "coopération";
    }
}