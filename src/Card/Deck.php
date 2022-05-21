<?php

namespace App\Card;

use App\Controller;

/**
 * Deck class to create a deck of cards
 */
class Deck
{
    public $deck;

    /**
     * Constructs the deck array
     */
    public function __construct()
    {
        $this->deck = array();
    }

    /**
     * Method to add a card to deck
     * @param object $card which card to add
     */
    public function addACard($Card)
    {
        $this->deck[] = $Card;
    }

    /**
     * Method to fill deck with cards with help from Card class
     */
    public function fillDeck()
    {
        $colors = ["Hearts", "Diamonds", "Spades", "Clubs"];
        $values = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
        foreach ($colors as &$color) {
            // foreach ($realValues as &$realValue) {
            foreach ($values as &$value) {
                self::addACard(new \App\Card\Card($value, $color));
            }
            // }
        }
    }

    /**
     * Method to shuffle deck
     */
    public function shuffle()
    {
        shuffle($this->deck);
    }

    /**
     * Method to draw card from deck
     * @param int $no number of cards to draw (1 as default)
     * @return array $hand cards in hand
     */
    public function drawCard($no = 1)
    {
        $hand = [];
        for ($i = 0; $i <= $no - 1; $i++) {
            if (count($this->deck) < 1) {
                return $hand;
            }
            if ($this->deck[0]->cardsUsed == 1) {
                self::shuffle();
            }
            $hand[] = $this->deck[0];
            $this->deck[0]->cardsUsed = 1;
            $removedCard = array_shift($this->deck);
            self::shuffle();
        }
        return $hand;
    }
}
