<?php

namespace App\Card;

use App\Controller;

class Game
{
    public $deck;
    public $player;
    public $bank;

    public function __construct(int $playerScore = 0, int $bankScore = 0)
    {
        $this->deck = new \App\Card\Deck();
        $this->player = new \App\Card\Player([]);
        $this->bank = new \App\Card\Player([]);
        $this->playerScore = $playerScore;
        $this->bankScore = $bankScore;
        // $this->playerTotScore = $playerTotScore;
        // $this->bankTotScore = $bankTotScore;
        $this->deck->fillDeck();
        $this->deck->shuffle();
    }


}
