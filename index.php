<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournoi de Stratégies</title>
    <!-- Lien vers le CSS de Bootstrap -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <?php
        require_once __DIR__ . '/vendor/autoload.php';

        use App\Entity\Player;
        use App\Entity\Tournament;
        use App\Entity\RandomStrategy;
        use App\Entity\CopycatStrategy;
        use App\Service\TournamentService;
        use App\Entity\AlwaysCooperateStrategy;
        use App\Entity\AlwaysDefectiveStrategy;
        use App\Service\DetailedResultsService;
        use App\Service\RankingStrategyService;
        use App\Service\TournamentResultService;
        use App\Service\TournamentRankingService;

        $cooperateStrategy = new AlwaysCooperateStrategy();
        $defectiveStrategy = new AlwaysDefectiveStrategy();
        $copycatStrategy = new CopycatStrategy();
        $randomStrategy = new RandomStrategy();

        $strategies = [$cooperateStrategy, $defectiveStrategy, $copycatStrategy, $randomStrategy];

        $player1 = new Player('Maurice', $cooperateStrategy);
        $player2 = new Player('Fred', $defectiveStrategy);
        $player3 = new Player('Miguel', $copycatStrategy);
        $player4 = new Player('Gilbert', $randomStrategy);

        $players = [$player1, $player2, $player3, $player4];

        $tournament = new Tournament($players);

        $tournamentService = new TournamentService($tournament);
        $tournamentResultService = new TournamentResultService($tournament);
        $detailedResultsService = new DetailedResultsService();
        $tournamentRankingService = new TournamentRankingService();
        $rankingStrategyService = new RankingStrategyService($strategies);

        $results = $tournamentService->runTournament();

        echo '<h1>Classement final</h1>';
        echo $tournamentRankingService->generateRanking($results);
        echo '<hr />';
        echo '<h1>Résultats du tournoi</h1>';
        echo $tournamentResultService->generateResultsTable($results);
        echo '<hr />';
        echo '<h1>Classement des stratégies</h1>';
        echo $rankingStrategyService->generateRanking($results);
        echo '<hr />';
        echo '<h1>Résultats détaillés</h1>';
        echo $detailedResultsService->generateDetailedResults($results);
        echo '<hr />';
        ?>
        </div>
        <!-- Lien vers le JS de Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
