<?php

namespace App\Service;

use App\Entity\Player;
use App\Entity\Tournament;

class TournamentService
{
    private Tournament $tournament;

    public function __construct(Tournament $tournament)
    {
        $this->tournament = $tournament;
    }

    public function runTournament(): array
    {
        return $this->tournament->run();
    }

    public function generateResultsTable(array $results): string
    {
        return $this->tournament->generateResultsTable($results);
    }
}