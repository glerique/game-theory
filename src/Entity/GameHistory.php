<?php

namespace App\Entity;

class GameHistory
{
    private array $player1Choices = [];
    private array $player2Choices = [];
    private array $player1Gains = [];
    private array $player2Gains = [];

    public function addRound(string $choice1, string $choice2, array $gains): void
    {
        $this->player1Choices[] = $choice1;
        $this->player2Choices[] = $choice2;
        $this->player1Gains[] = $gains[0];
        $this->player2Gains[] = $gains[1];
    }

    public function getPlayer1History(): array
    {
        return $this->player1Choices;
    }

    public function getPlayer2History(): array
    {
        return $this->player2Choices;
    }

    public function getPlayer1Gains(): array
    {
        return $this->player1Gains;
    }

    public function getPlayer2Gains(): array
    {
        return $this->player2Gains;
    }
}