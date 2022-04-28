<?php

namespace App\Card;

use App\Controller;

class Game
{
    public $deck;
    public $player;
    public $bank;

    public function __construct(int $playerScore, int $bankScore)
    {
        $this->deck = new \App\Card\Deck();
        $this->player = new \App\Card\Player([]);
        $this->bank = new \App\Card\Player([]);
        $this->playerScore = $playerScore;
        $this->bankScore = $bankScore;
        $this->deck->fillDeck();
        $this->deck->shuffle();
    }

    public function takeCardPlayer() // Kanske inte fungerar...
    {
        // $hand = $this->deck->drawCard(1)
        $drawnCard = $this->deck->drawCard(1);
        $this->player->handArray($drawnCard);
    }

    private function cardToBank()
    {
        while ($this->bankScore <= 17) {
            $drawnCard = $this->deck->drawCard(1);
            $this->bank->handArray($drawnCard);
            $this->bankScore = self::score($this->bank);
        }
    }

    protected function score(object $player)
    {
        $score = 0;
        foreach ($player->hand as $card) {
            foreach ($card as $value) {
                $score += $value->key;
            }
        }
        return $score;
    }

    public function nextRound()
    {
        $this->playerScore = 0;
        $this->bankScore = 0;
        $this->player->hand = null;
        $this->computer->hand = null;
    }
}
