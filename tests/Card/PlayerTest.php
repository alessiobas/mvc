<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Player.
 */
class PlayerTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties, use no arguments.
     */
    public function testCreatePlayer()
    {
        $player = new Player([]);
        $this->assertInstanceOf("\App\Card\Player", $player);

        $this->assertNotEmpty($player);
    }
}
