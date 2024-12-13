<?php

namespace App\Entity;

use App\Entity\ResultMatch;
use App\Service\ScoreCalculator;

class Game
{
    private Player $player1;
    private Player $player2;
    private ScoreCalculator $scoreCalculator;
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
        $this->scoreCalculator = new ScoreCalculator();
    }

    public function play(): void
    {
        $this->gainsPlayer1 = [];
        $this->gainsPlayer2 = [];
        $this->historyPlayer1 = [];
        $this->historyPlayer2 = [];


        for ($round = 1; $round <= $this->rounds; $round++) {
            $choice1 = $this->player1->makeChoice($this->historyPlayer2);
            $choice2 = $this->player2->makeChoice($this->historyPlayer1);



            $this->historyPlayer1[] = $choice1;
            $this->historyPlayer2[] = $choice2;


            $gains = $this->scoreCalculator->calculate($choice1, $choice2);
            $this->player1->addScore($gains[0]);
            $this->player2->addScore($gains[1]);


            $this->gainsPlayer1[] = $gains[0];
            $this->gainsPlayer2[] = $gains[1];
        }
    }

    public function getResults(): ResultMatch
    {
        return new ResultMatch(
            $this->player1,
            $this->player2,
            $this->historyPlayer1,
            $this->historyPlayer2,
            array_sum($this->gainsPlayer1),
            array_sum($this->gainsPlayer2),
            $this->gainsPlayer1,
            $this->gainsPlayer2
        );
    }
}