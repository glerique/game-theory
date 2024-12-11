<?php

namespace App\Entity;

abstract class Strategy{

    abstract public function chooseAction(array $opponentHistory): string;
}

