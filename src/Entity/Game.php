<?php

namespace App\Entity;

class Game
{
    private Player $player1;
    private Player $player2;
    private int $rounds;
    private array $historyPlayer1 = [];
    private array $historyPlayer2 = [];
    private array $gainsPlayer1 = [];
    private array $gainsPlayer2 = [];

    public function __construct(Player $player1, Player $player2, int $rounds = 10)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
        $this->rounds = $rounds;
    }

    public function play(): void
    {
        for ($round = 1; $round <= $this->rounds; $round++) {
            $choice1 = $this->player1->makeChoice($this->historyPlayer2);
            $choice2 = $this->player2->makeChoice($this->historyPlayer1);

            $this->historyPlayer1[] = $choice1;
            $this->historyPlayer2[] = $choice2;

            $gains = $this->calculateGains($choice1, $choice2);
            $this->player1->addScore($gains[0]);
            $this->player2->addScore($gains[1]);

            $this->gainsPlayer1[] = $gains[0];
            $this->gainsPlayer2[] = $gains[1];
        }
    }

    private function calculateGains(string $choice1, string $choice2): array
    {
        if ($choice1 === "coopérer" && $choice2 === "coopérer") {
            return [3, 3];
        }
        if ($choice1 === "coopérer" && $choice2 === "défection") {
            return [0, 5];
        }
        if ($choice1 === "défection" && $choice2 === "coopérer") {
            return [5, 0];
        }
        return [1, 1]; // défection vs défection
    }

    public function getResults(): array
    {
        return [
            'player1' => $this->player1->getName(),
            'player1_score' => $this->player1->getScore(),
            'player2' => $this->player2->getName(),
            'player2_score' => $this->player2->getScore(),
            'history_player1' => $this->historyPlayer1,
            'history_player2' => $this->historyPlayer2,
            'gains_player1' => $this->gainsPlayer1,
            'gains_player2' => $this->gainsPlayer2,
        ];
    }
}