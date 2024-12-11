<?php

namespace App\Entity;

class AlwaysDefectiveStrategy extends Strategy
{
    public function chooseAction(array $opponentHistory): string
    {
        return "défection";
    }
}