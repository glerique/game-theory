<?php

namespace App\Service;

class RankingStrategyService
{
    public function generateRanking(array $results): string
    {
        $ranking = [];
        foreach ($results as $result) {
            if (!isset($ranking[$result['strategy1']])) {
                $ranking[$result['strategy1']] = 0;
            }
            if (!isset($ranking[$result['strategy2']])) {
                $ranking[$result['strategy2']] = 0;
            }
            $ranking[$result['strategy1']] += $result['player1_score'];
            $ranking[$result['strategy2']] += $result['player2_score'];
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