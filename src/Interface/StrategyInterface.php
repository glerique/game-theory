<?php

namespace App\Interface;

interface StrategyInterface
{
    public function chooseAction(array $opponentHistory): string;
}

