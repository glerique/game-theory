<?php

namespace App\Entity;

class ResultMatch
{


        public function __construct(
        private readonly Player $player1,
        private readonly Player $player2,
        private readonly array $historyPlayer1,
        private readonly array $historyPlayer2,
        private $totalScorePlayer1,
        private $totalScorePlayer2,
        private $gainsPlayer1,
        private $gainsPlayer2,
    ) {}

    public function getPlayer1(): Player
    {
        return $this->player1;
    }

    public function getPlayer2(): Player
    {
        return $this->player2;
    }

    public function getHistoryPlayer1(): array
    {
        return $this->historyPlayer1;
    }

    public function getHistoryPlayer2(): array
    {
        return $this->historyPlayer2;
    }

    public function getScorePlayer1(): int
    {
        return $this->totalScorePlayer1;
    }

    public function getScorePlayer2(): int
    {
        return array_sum($this->gainsPlayer2);
    }

    public function getGainsPlayer1(): array
    {
        return $this->gainsPlayer1;
    }

    public function getGainsPlayer2(): array
    {
        return $this->gainsPlayer2;
    }
}