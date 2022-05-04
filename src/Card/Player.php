<?php

namespace App\Card;

use App\Controller;

/**
 * Player class to initiate player
 */
class Player
{
    /**
     * Constructs player
     * @param array $hand creates empty array
     */
    public function __construct($hand)
    {
        $this->hand = $hand;
    }

    /**
     * Method to push param to hand array
     * @param array $hand 
     */
    public function handArray($hand)
    {
        $this->hand[] = $hand;
    }
}
