<?php

namespace App\Entity;

class Player
{
    private string $name;
    private Strategy $strategy;
    private int $score = 0;

    public function __construct(string $name, Strategy $strategy)
    {
        $this->name = $name;
        $this->strategy = $strategy;
    }

    public function makeChoice(array $opponentHistory): string
    {
        return $this->strategy->chooseAction($opponentHistory);
    }

    public function addScore(int $gain): void
    {
        $this->score += $gain;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function getName(): string
    {
        return $this->name;
    }
}