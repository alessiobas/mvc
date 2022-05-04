<?php

/**
 * This file contains class Card that is part of the cardgame 21
 */

namespace App\Card;

use App\Controller;

/**
 * Card class which creates a card
 */
class Card
{
    /**
     * Constructs Card
     * @param int $value value of the card
     * @param string $color color of the card
     * @param int $cardsUsed check if card is in use (1) or not (0)
     */
    public function __construct($value, $color, $cardsUsed = 0)
    {
        $this->value = $value;
        $this->color = $this->symbol($color);
        $this->cardsUsed = $cardsUsed;
    }

    /**
     * Private method that changes color to symbol based on color string value
     * @param string $col which color of the card
     */
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

    /**
     * Method to get card value and color symbol as string. Used for tests
     */
    public function getAsString(): string
    {
        return "[{$this->value}{$this->color}]";
    }
}
