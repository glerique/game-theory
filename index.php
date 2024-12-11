<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Entity\Player;
use App\Entity\Tournament;
use App\Entity\RandomStrategy;
use App\Entity\AlwaysCooperateStrategy;
use App\Entity\AlwaysDefectiveStrategy;

$cooperateStrategy = new AlwaysCooperateStrategy();
$defectiveStrategy = new AlwaysDefectiveStrategy();
$randomStrategy = new RandomStrategy();

// Créez des instances de joueurs avec un nom et une stratégie
$player1 = new Player('Maurice', $cooperateStrategy);
$player2 = new Player('Fred', $defectiveStrategy);
$player3 = new Player('Miguel', $randomStrategy);
$player4 = new Player('Gilbert', $cooperateStrategy);
// Ajoutez les joueurs à un tableau
$players = [$player1, $player2, $player3, $player4];

// Créez une instance de Tournament avec les joueurs
$tournament = new Tournament($players);

// Exécutez le tournoi et obtenez les résultats
$results = $tournament->run();

// Affichez les résultats
echo '<h1>Résultats du tournoi</h1>';
echo $tournament->generateResultsTable($results);
echo '<hr />';
echo '<h1>Résultats détaillés</h1>';
foreach ($results as $result) {
    echo '<h2>Match entre ' . $result['player1'] . ' et ' . $result['player2'] . '</h2>';
    echo '<p>Score de ' . $result['player1'] . ': ' . $result['player1_score'] . '</p>';
    echo '<p>Score de ' . $result['player2'] . ': ' . $result['player2_score'] . '</p>';
    echo '<p>Historique des choix de ' . $result['player1'] . ': ' . implode(', ', $result['history_player1']) . '</p>';
    echo '<p>Historique des choix de ' . $result['player2'] . ': ' . implode(', ', $result['history_player2']) . '</p>';
    echo '<p>Gains de ' . $result['player1'] . ': ' . implode(', ', $result['gains_player1']) . '</p>';
    echo '<p>Gains de ' . $result['player2'] . ': ' . implode(', ', $result['gains_player2']) . '</p>';
}
