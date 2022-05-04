<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Game.
 */
class GameTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties, use no arguments.
     */
    public function testCreateGame()
    {
        $game = new Game();
        $this->assertInstanceOf("\App\Card\Game", $game);

        $this->assertNotEmpty($game);
    }

    /**
     * Construct object and verify Player can play
     */
    public function testPlayerPlay()
    {
        $game = new Game();
        $this->assertInstanceOf("\App\Card\Game", $game);
        $game->playPlayer();
        $this->assertEquals(1, count($game->player->hand));
    }

    /**
     * Construct object and verify Player score is equal to value of drawn card
     */
    public function testPlayerScore()
    {
        $game = new Game();
        $this->assertInstanceOf("\App\Card\Game", $game);
        $game->playPlayer();
        $this->assertEquals($game->playerScore, $game->player->hand[0][0]->value);
    }

    /**
     * Construct object and verify Bank can play
     */
    public function testBankPlay()
    {
        $game = new Game();
        $this->assertInstanceOf("\App\Card\Game", $game);
        $game->playBank();
        $this->assertNotEmpty($game);
        $this->assertNotEquals(1, count($game->bank->hand));
    }

    /**
     * Construct object and verify that scores are reset when new round is executed
     */
    public function testNewRound()
    {
        $game = new Game();
        $game->playPlayer();
        $game->playBank();
        $this->assertNotEquals(0, $game->playerScore);
        $this->assertNotEquals(0, $game->bankScore);
        $game->newRound();
        $this->assertEquals(0, $game->playerScore);
        $this->assertEquals(0, $game->bankScore);
    }
}
