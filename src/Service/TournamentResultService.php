<?php

namespace App\Service;

use App\Entity\ResultMatch;

class TournamentResultService
{
    public function generateResults(array $results): array
    {
        $formattedResults = [];

        /** @var ResultMatch $result */
        foreach ($results as $result) {
            $formattedResults[] = [
                'player1' => $result->getPlayer1()->getName(),
                'player2' => $result->getPlayer2()->getName(),
                'player1_score' => $result->getScorePlayer1(),
                'player2_score' => $result->getScorePlayer2(),

            ];
        }

        return $formattedResults;
    }

    public function generateResultsTable(array $results): string
    {
        $formattedResults = $this->generateResults($results);

        $table = '<table border="1">';
        $table .= '<tr><th>Player 1</th><th>Player 2</th><th>Score 1</th><th>Score 2</th></tr>';

        foreach ($formattedResults as $result) {
            $table .= sprintf(
                '<tr><td>%s</td><td>%s</td><td>%d</td><td>%d</td></tr>',
                $result['player1'],
                $result['player2'],
                $result['player1_score'],
                $result['player2_score']
            );
        }

        $table .= '</table>';
        return $table;
    }
}