<?php

/**
 * This file contains class Card that is part of the cardgame 21
 */

namespace App\Card;

use App\Controller;

class Card
{
    public function __construct($value, $color, $cardsUsed = 0)
    {
        $this->value = $value;
        $this->color = $this->symbol($color);
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

    public function getAsString(): string
    {
        return "[{$this->value}{$this->color}]";
    }
}
