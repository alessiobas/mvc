<?php

namespace App\Card;

use App\Controller;

class Game
{
    public $deck;
    public $player;
    public $bank;
    public $res;

    public function __construct(int $playerScore = 0, int $bankScore = 0)
    {
        $this->deck = new \App\Card\Deck();
        $this->player = new \App\Card\Player([]);
        $this->bank = new \App\Card\Player([]);
        $this->playerScore = $playerScore;
        $this->bankScore = $bankScore;
        $this->deck->fillDeck();
        $this->deck->shuffle();
    }

    public function takeCard(player $thePlayer) // Kanske inte fungerar...
    {
        // $hand = $this->deck->drawCard(1)
        $drawnCard = $this->deck->drawCard(1);
        $thePlayer->handArray($drawnCard);
    }

    private function cardToBank()
    {
        while ($this->bankScore <= 17) {
            self::takeCard($this->bank);
            $this->bankScore = self::score($this->bank);
        }
    }

    protected function score(object $player)
    {
        $score = 0;
        foreach ($player->hand as &$card) {
            foreach ($card as &$val) {
                $score += $val->value;
            }
        }
        return $score;
    }

    public function newRound()
    {
        $this->playerScore = 0;
        $this->bankScore = 0;
        $this->player->hand = null;
        $this->bank->hand = null;
    }

    public function checkWinner()
    {
        $this->res = "-";
        if ($this->playerScore > 21) {
            $this->res = "Bank wins";
        } elseif ($this->bankScore > 21) {
            $this->res = "Player wins";
        } elseif ($this->bankScore < $this->playerScore) {
            $this->res = "Player wins";
        } elseif ($this->bankScore == $this->playerScore) {
            $this->res = "Bank wins";
        } elseif ($this->bankScore > $this->playerScore) {
            $this->res = "Bank wins";
        } else {
            $this->res = "Continue";
        }
        return $this->res;
    }

    public function playPlayer()
    {
        self::takeCard($this->player);
        $this->playerScore = self::score($this->player);
        // $res = self::checkWinner();
        // if ($res == "Bank wins" || $res == "Player wins") {
        //     return 4;
        // }
        // return null;
    }

    public function playBank()
    {
        self::cardToBank();
        self::checkWinner();
    }
}
