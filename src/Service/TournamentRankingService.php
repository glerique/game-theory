<?php

namespace App\Service;

class TournamentRankingService
{
    public function generateRanking(array $results): string
    {
        $ranking = [];
        foreach ($results as $result) {
            if (!isset($ranking[$result['player1']])) {
                $ranking[$result['player1']] = 0;
            }
            if (!isset($ranking[$result['player2']])) {
                $ranking[$result['player2']] = 0;
            }
            $ranking[$result['player1']] += $result['player1_score'];
            $ranking[$result['player2']] += $result['player2_score'];
        }

        arsort($ranking);

        $table = '<table border="1"><tr><th>Player</th><th>Score</th></tr>';
        foreach ($ranking as $player => $score) {
            $table .= sprintf('<tr><td>%s</td><td>%d</td></tr>', $player, $score);
        }
        $table .= '</table>';

        return $table;
    }
}