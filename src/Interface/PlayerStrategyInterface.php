<?php

namespace App\Interface;

interface PlayerStrategyInterface
{
    public function makeChoice(array $opponentHistory): string;
}