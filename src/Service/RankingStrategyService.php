<?php

namespace App\Service;

use App\Entity\ResultMatch;

class RankingStrategyService
{
    public function generateRanking(array $results): string
    {
        $ranking = [];

        /** @var ResultMatch $result */
        foreach ($results as $result) {
            $strategy1 = $result->getPlayer1()->getStrategy();
            $strategy2 = $result->getPlayer2()->getStrategy();

            if (!isset($ranking[$strategy1])) {
                $ranking[$strategy1] = 0;
            }
            if (!isset($ranking[$strategy2])) {
                $ranking[$strategy2] = 0;
            }

            $ranking[$strategy1] += $result->getScorePlayer1();
            $ranking[$strategy2] += $result->getScorePlayer2();
        }

        arsort($ranking);

        $table = '<table border="1"><tr><th>Stratégie</th><th>Score</th></tr>';
        foreach ($ranking as $strategy => $score) {
            $table .= sprintf('<tr><td>%s</td><td>%d</td></tr>', $strategy, $score);
        }
        $table .= '</table>';

        return $table;
    }
}