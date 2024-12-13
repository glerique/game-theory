<?php

namespace App\Interface;

interface StrategyInterface
{
    public function getName(): string;
    public function chooseAction(array $opponentHistory): string;
}

