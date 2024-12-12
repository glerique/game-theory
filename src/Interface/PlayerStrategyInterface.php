<?php

namespace App\Interface;

interface PlayerStrategyInterface
{
    public function getName(): string;

    public function makeChoice(array $opponentHistory): string;
}