<?php

namespace App\Service;

class DetailedResultsService
{
    public function generateDetailedResults(array $results): string
    {
        // Générer les résultats détaillés
        $details = '';
        foreach ($results as $result) {
            $details .= '<h2>Match entre ' . $result['player1'] . ' et ' . $result['player2'] . '</h2>';
            $details .= '<p>Score de ' . $result['player1'] . ': ' . $result['player1_score'] . '</p>';
            $details .= '<p>Score de ' . $result['player2'] . ': ' . $result['player2_score'] . '</p>';
            $details .= '<p>Historique des choix de ' . $result['player1'] . ': ' . implode(', ', $result['history_player1']) . '</p>';
            $details .= '<p>Historique des choix de ' . $result['player2'] . ': ' . implode(', ', $result['history_player2']) . '</p>';
            $details .= '<p>Gains de ' . $result['player1'] . ': ' . implode(', ', $result['gains_player1']) . '</p>';
            $details .= '<p>Gains de ' . $result['player2'] . ': ' . implode(', ', $result['gains_player2']) . '</p>';
        }
        return $details;
    }
}