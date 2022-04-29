<?php

namespace App\Card;

use App\Controller;

class Deck
{
    public $deck;
    public function __construct()
    {
        $this->deck = array();
    }

    public function addACard($Card)
    {
        $this->deck[] = $Card;
    }

    public function fillDeck()
    {
        $colors = ["Hearts", "Diamonds", "Spades", "Clubs"];
        // $values = [2 => "2", 3 => "3", 4 => "4", 5 => "5", 6 => "6", 7 => "7", 8 => "8", 9 => "9", 10 => "10", 11 => "J", 12 => "Q", 13 => "K", 14 => "A"];
        $values = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
        foreach ($colors as &$color) {
            // foreach ($realValues as &$realValue) {
                foreach ($values as &$value) {
                    self::addACard(new \App\Card\Card($value, $color));
                }
            // }
        }
    }

    public function shuffle()
    {
        shuffle($this->deck);
    }

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
