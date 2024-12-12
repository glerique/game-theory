<?php

namespace App\Service;

use App\Entity\Tournament;

class TournamentResultService
{
    private Tournament $tournament;

    public function __construct(Tournament $tournament)
    {
        $this->tournament = $tournament;
    }

    public function generateResultsTable(array $results): string
    {
        $table = '<table border="1"><tr><th>Player 1</th><th>Score 1</th><th>Player 2</th><th>Score 2</th></tr>';
        foreach ($results as $result) {
            $table .= sprintf(
                '<tr><td>%s</td><td>%d</td><td>%s</td><td>%d</td></tr>',
                $result['player1'], $result['player1_score'],
                $result['player2'], $result['player2_score']
            );
        }
        $table .= '</table>';
        return $table;
    }
}