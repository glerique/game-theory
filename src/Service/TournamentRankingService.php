<?php

namespace App\Service;

use App\Entity\ResultMatch;

class TournamentRankingService
{
    public function generateRanking(array $results): string
    {
        $ranking = [];

        /** @var ResultMatch $result */
        foreach ($results as $result) {
            $player1Name = $result->getPlayer1()->getName();
            $player2Name = $result->getPlayer2()->getName();

            if (!isset($ranking[$player1Name])) {
                $ranking[$player1Name] = 0;
            }
            if (!isset($ranking[$player2Name])) {
                $ranking[$player2Name] = 0;
            }

            $ranking[$player1Name] += $result->getScorePlayer1();
            $ranking[$player2Name] += $result->getScorePlayer2();
        }

        arsort($ranking);

        $table = '<table class="table table-bordered">';
        $table .= '<thead class="thead-dark"><tr><th>Player</th><th>Score</th></tr></thead>';
        $table .= '<tbody>';
        foreach ($ranking as $player => $score) {
            $table .= sprintf('<tr><td>%s</td><td>%d</td></tr>', $player, $score);
        }
        $table .= '</tbody></table>';

        return $table;
    }
}