<?php

namespace App\Card;

use App\Controller;

/**
 * Game class to initiate game 21
 */
class Game
{
    /**
     * @var object $deck Deck to be used in game
     * @var object $player Player (user)
     * @var object $bank Bank (computer)
     * @var string $res Result of the game
     */
    public $deck;
    public $player;
    public $bank;
    public $res;

    /**
     * Constructs Game
     * @param int $playerScore default 0
     * @param int $bankScore default 0
     */
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

    /**
     * Method for player or bank to take a card from the deck
     * @param object $thePlayer which player is taking a card
     */
    public function takeCard(player $thePlayer)
    {
        $drawnCard = $this->deck->drawCard(1);
        $thePlayer->handArray($drawnCard);
    }

    /**
     * Private method to give the bank cards until $bankScore is less or equal to 17
     */
    private function cardToBank()
    {
        while ($this->bankScore <= 17) {
            self::takeCard($this->bank);
            $this->bankScore = self::score($this->bank);
        }
    }

    /**
     * Protected method to count score
     * @param object $player which players score should be counted
     * @return int total score of player
     */
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

    /**
     * Method to initiate a new round of game 21.
     * Resets players score and hands
     */
    public function newRound()
    {
        $this->playerScore = 0;
        $this->bankScore = 0;
        $this->player->hand = null;
        $this->bank->hand = null;
    }

    /**
     * Method to check who won the game
     * @return string winner
     */
    public function checkWinner()
    {
        $this->res = "Continue";
        if ($this->playerScore > 21) {
            $this->res = "Bank wins";
        } elseif ($this->bankScore > 21) {
            $this->res = "Player wins";
        } elseif ($this->bankScore < $this->playerScore ) {
            $this->res = "Player wins";
        } elseif ($this->bankScore == $this->playerScore || $this->bankScore > $this->playerScore) {
            $this->res = "Bank wins";
        }
        return $this->res;
    }

    /**
     * Method to play as Player. Draws a card and counts player score
     */
    public function playPlayer()
    {
        self::takeCard($this->player);
        $this->playerScore = self::score($this->player);
    }

    /**
     * Method for bank to play. Draws cards for bank and tells who won.
     */
    public function playBank()
    {
        self::cardToBank();
        self::checkWinner();
    }
}
