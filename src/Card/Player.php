<?php

namespace App\Card;

use App\Controller;

class Player
{
    public function __construct($hand)
    {
        $this->hand = $hand;
    }
}
