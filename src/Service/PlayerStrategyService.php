<?php

namespace App\Service;

use App\Entity\Strategy;

class PlayerStrategyService implements PlayerStrategyInterface
{
    private Strategy $strategy;

    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function makeChoice(array $opponentHistory): string
    {
        return $this->strategy->chooseAction($opponentHistory);
    }
}