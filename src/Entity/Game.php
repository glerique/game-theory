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

    // Définition des choix possibles
    private const CHOICE_COOPERATION = 'coopération';
    private const CHOICE_DEFECTION = 'défection';

    // Matrice de récompenses
    private const PAYOFF_MATRIX = [
        [3, 3], // coopération vs coopération
        [0, 5], // coopération vs défection
        [5, 0], // défection vs coopération
        [1, 1]  // défection vs défection
    ];

    public function __construct(Player $player1, Player $player2, int $rounds = 10)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
        $this->rounds = $rounds;
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

            // Valider les choix
            if (!$this->isValidChoice($choice1) || !$this->isValidChoice($choice2)) {
                throw new \InvalidArgumentException("Choix invalide détecté.");
            }

            // Enregistrer les choix
            $this->historyPlayer1[] = $choice1;
            $this->historyPlayer2[] = $choice2;

            // Calculer les gains
            $gains = $this->calculateGains($choice1, $choice2);
            $this->player1->addScore($gains[0]);
            $this->player2->addScore($gains[1]);

            // Stocker les gains
            $this->gainsPlayer1[] = $gains[0];
            $this->gainsPlayer2[] = $gains[1];
        }
    }


        private function calculateGains(string $choice1, string $choice2): array
        {
            $index = match ([$choice1, $choice2]) {
                [self::CHOICE_COOPERATION, self::CHOICE_COOPERATION] => 0,
                [self::CHOICE_COOPERATION, self::CHOICE_DEFECTION] => 1,
                [self::CHOICE_DEFECTION, self::CHOICE_COOPERATION] => 2,
                [self::CHOICE_DEFECTION, self::CHOICE_DEFECTION] => 3,
            };

            return self::PAYOFF_MATRIX[$index];
        }




    private function isValidChoice(string $choice): bool
    {
        return in_array($choice, [self::CHOICE_COOPERATION, self::CHOICE_DEFECTION], true);
    }

    public function getResults(): array
    {
        return [
            'player1' => $this->player1->getName(),
            'strategy1' => $this->player1->getStrategy(),
            'player1_score' => array_sum($this->gainsPlayer1),
            'player2' => $this->player2->getName(),
            'strategy2' => $this->player2->getStrategy(),
            'player2_score' => array_sum($this->gainsPlayer2),
            'history_player1' => $this->historyPlayer1,
            'history_player2' => $this->historyPlayer2,
            'gains_player1' => $this->gainsPlayer1,
            'gains_player2' => $this->gainsPlayer2,
        ];
    }
}