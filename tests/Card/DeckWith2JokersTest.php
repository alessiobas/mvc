<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class DeckWith2Jokers.
 */
class DeckWith2JokersTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties, use no arguments.
     */
    public function testCreateDeck()
    {
        $deck = new DeckWith2Jokers();
        $this->assertInstanceOf("\App\Card\DeckWith2Jokers", $deck);

        $this->assertNotEmpty($deck);
    }

    /**
     * Construct object and verify that the object can be filled and it works to
     * add 2 jokers
     */
    public function testFillDeckWithJokers()
    {
        $deck = new DeckWith2Jokers();
        $deck->fillDeckWithJokers();
        $amountOfCards = count($deck->deck);
        $this->assertEquals(54, $amountOfCards);
        $resOne = $deck->deck[52]->getAsString();
        $resTwo = $deck->deck[53]->getAsString();
        $this->assertEquals('[Joker👹]', $resOne);
        $this->assertEquals('[Joker👹]', $resTwo);
    }
}