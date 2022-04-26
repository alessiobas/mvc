<?php

namespace App\Card;

use App\Controller;

class DeckWith2Jokers extends Deck
{
    public function __construct()
    {
        parent::__construct();
    }

    public function fillDeckWithJokers()
    {
        parent::fillDeck();
        parent::addACard(new \App\Card\Card("Joker", "Joker"));
        parent::addACard(new \App\Card\Card("Joker", "Joker"));
    }
}