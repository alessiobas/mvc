<?php

namespace App\Card;

use App\Controller;

class Card
{
    public function __construct($value, $color, $cardsUsed = 0)
    {
        $this->value = $value;
        $this->color = $this->symbol($color);
        // $this->realValue = $realValue;
        $this->cardsUsed = $cardsUsed;
    }

    private function symbol(string $col): string
    {
        if ($col == "Hearts") {
            return '♥';
        }
        if ($col == "Diamonds") {
            return '♦';
        }
        if ($col == "Spades") {
            return '♠';
        }
        if ($col == "Clubs") {
            return '☘';
        }
        if ($col == "Joker") {
            return '👹';
        }
        return '?';
    }
}
