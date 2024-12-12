<?php

namespace App\Entity;

use App\Interface\StrategyInterface;

class RandomStrategy implements StrategyInterface
{
    public function chooseAction(array $opponentHistory): string
    {
        return rand(0, 1) === 0 ? "coopération" : "défection";
    }

    public function getName(): string
    {
        return 'Random Strategy';
    }

    public function getScore(): int
    {
        // Implémentez la logique pour obtenir le score de la stratégie
        return 0; // Remplacez par la logique réelle
    }
}