<?php

namespace App\Service;

use App\Entity\ResultMatch;

class DetailedResultsService
{
    public function generateDetailedResults(array $results): string
    {
        $details = '<div class="results-container">';

        /** @var ResultMatch $result */
        foreach ($results as $result) {
            $details .= '<h2>Match entre ' . $result->getPlayer1()->getName() . ' et ' . $result->getPlayer2()->getName() . '</h2>';
            $details .= '<p>Score de ' . $result->getPlayer1()->getName() . ': ' . $result->getScorePlayer1() . '</p>';
            $details .= '<p>Score de ' . $result->getPlayer2()->getName() . ': ' . $result->getScorePlayer2() . '</p>';
            $details .= '<p>Historique des choix de ' . $result->getPlayer1()->getName() . ': ' . implode(', ', $result->getHistoryPlayer1()) . '</p>';
            $details .= '<p>Historique des choix de ' . $result->getPlayer2()->getName() . ': ' . implode(', ', $result->getHistoryPlayer2()) . '</p>';
            $details .= '<p>Gains de ' . $result->getPlayer1()->getName() . ': ' . implode(', ', $result->getGainsPlayer1()) . '</p>';
            $details .= '<p>Gains de ' . $result->getPlayer2()->getName() . ': ' . implode(', ', $result->getGainsPlayer2()) . '</p>';
        }

        $details .= '</div>';
        return $details;
    }
}