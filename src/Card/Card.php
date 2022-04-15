<?php

namespace App\Card;

class Card
{
    public function __construct($value, $color, $cardsUsed = 0)
    {
        $this->value = $value;
        $this->color = $color;
        $this->cardsUsed = $cardsUsed;
    }
}