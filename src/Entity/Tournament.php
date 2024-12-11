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

        public function generateResultsTable(array $results): string        {

            $html = '<table border="1"><tr><th>Player 1</th><th>Score 1</th><th>Player 2</th><th>Score 2</th></tr>';
            foreach ($results as $result) {
                $html .= sprintf(
                    '<tr><td>%s</td><td>%d</td><td>%s</td><td>%d</td></tr>',
                    $result['player1'], $result['player1_score'],
                    $result['player2'], $result['player2_score']
                );
            }
            $html .= '</table>';
            return $html;
        }
    }