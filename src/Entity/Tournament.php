<?php

namespace   App\Entity;

use App\Entity\Game;

    class Tournament
    {
        private array $players;

        public function __construct(array $players)
        {
            $this->players = $players;
        }
/*
        public function run(): array
        {
        $results = [];
        foreach ($this->players as $i => $player1) {
            for ($j = $i + 1; $j < count($this->players); $j++) {
                $player2 = $this->players[$j];
                $game = new Game($player1, $player2);
                $game->play();
                $results[] = $game->getResults();
                }
            }
            return $results;
        }
 */
        public function run(): array
        {
            $results = [];
            $matchups = $this->generateMatchups($this->players);

            foreach ($matchups as [$player1, $player2]) {
                $game = new Game($player1, $player2);
                $game->play();
                $results[] = $game->getResults();
            }

            return $results;
        }

        private function generateMatchups(array $players): array
        {
            $matchups = [];
            $count = count($players);

            for ($i = 0; $i < $count; $i++) {
                for ($j = $i + 1; $j < $count; $j++) {
                    $matchups[] = [$players[$i], $players[$j]];
                }
            }

            return $matchups;
        }
    }