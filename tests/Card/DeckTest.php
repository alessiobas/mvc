<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Deck.
 */
class DeckTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties, use no arguments.
     */
    public function testCreateDeck()
    {
        $card = new Card(10, "Hearts");
        $this->assertInstanceOf("\App\Card\Card", $card);

        $this->assertNotEmpty($card);
    }
}