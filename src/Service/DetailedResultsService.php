<?php

namespace App\Service;

use App\Entity\ResultMatch;

class DetailedResultsService
{
    public function generateDetailedResults(array $results): string
    {
        $table = '<table border="1">';
        $table .= '<tr><th>Match</th><th>Joueur 1</th><th>Stratégie 1</th><th>Score 1</th>';
        $table .= '<th>Joueur 2</th><th>Stratégie 2</th><th>Score 2</th><th>Historique</th></tr>';

        /** @var ResultMatch $result */
        foreach ($results as $index => $result) {
            $matchNumber = $index + 1;
            $history1 = implode(',', $result->getHistoryPlayer1());
            $history2 = implode(',', $result->getHistoryPlayer2());

            $table .= sprintf(
                '<tr><td>%d</td><td>%s</td><td>%s</td><td>%d</td><td>%s</td><td>%s</td><td>%d</td><td>%s vs %s</td></tr>',
                $matchNumber,
                $result->getPlayer1()->getName(),
                $result->getPlayer1()->getStrategy(),
                $result->getScorePlayer1(),
                $result->getPlayer2()->getName(),
                $result->getPlayer2()->getStrategy(),
                $result->getScorePlayer2(),
                $history1,
                $history2
            );
        }

        $table .= '</table>';
        return $table;
    }
}