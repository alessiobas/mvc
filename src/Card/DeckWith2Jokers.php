<?php

namespace App\Card;

use App\Controller;

/**
 * DeckWith2Jokers class that extends Deck
 */
class DeckWith2Jokers extends Deck
{
    /**
     * Constructs DeckWith2Jokers
     * initiates array
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Method to fill the deck with all cards plus 2 jokers
     */
    public function fillDeckWithJokers()
    {
        parent::fillDeck();
        parent::addACard(new \App\Card\Card("Joker", "Joker"));
        parent::addACard(new \App\Card\Card("Joker", "Joker"));
    }
}
