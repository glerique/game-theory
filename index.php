<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Entity\Player;
use App\Entity\Tournament;
use App\Entity\RandomStrategy;
use App\Service\TournamentService;
use App\Service\DetailedResultService;
use App\Entity\AlwaysCooperateStrategy;
use App\Entity\AlwaysDefectiveStrategy;
use App\Service\TournamentResultService;

$cooperateStrategy = new AlwaysCooperateStrategy();
$defectiveStrategy = new AlwaysDefectiveStrategy();
$randomStrategy = new RandomStrategy();

$player1 = new Player('Maurice', $cooperateStrategy);
$player2 = new Player('Fred', $defectiveStrategy);
$player3 = new Player('Miguel', $randomStrategy);
$player4 = new Player('Gilbert', $cooperateStrategy);

$players = [$player1, $player2, $player3, $player4];

$tournament = new Tournament($players);

$tournamentService = new TournamentService($tournament);
$tournamentResultService = new TournamentResultService($tournament);
$detailedResultService = new DetailedResultService();

$results = $tournamentService->runTournament();

echo '<h1>Résultats du tournoi</h1>';
echo $tournamentResultService->generateResultsTable($results);
echo '<hr />';
echo '<h1>Résultats détaillés</h1>';
echo $detailedResultService->generateDetailedResults($results);
echo '<hr />';
