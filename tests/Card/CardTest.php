<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Card.
 */
class CardTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties, use no arguments.
     */
    public function testCreateCard()
    {
        $card = new Card(10, "Hearts");
        $this->assertInstanceOf("\App\Card\Card", $card);

        $this->assertNotEmpty($card);
    }

    /**
     * Construct object, get card symbol and verify it has the expected value and symbol
     */
    public function testCreateCardSymbol()
    {
        $card = new Card(10, "Hearts");
        $this->assertInstanceOf("\App\Card\Card", $card);

        $res = $card->getAsString();
        // print_r($res);

        $this->assertNotEmpty($res);
        $this->assertEquals('[10♥]', $card->getAsString());

        $card = new Card(10, "Diamonds");
        $this->assertEquals('[10♦]', $card->getAsString());

        $card = new Card(10, "Spades");
        $this->assertEquals('[10♠]', $card->getAsString());

        $card = new Card(10, "Clubs");
        $this->assertEquals('[10☘]', $card->getAsString());

        $card = new Card(10, "XXXX");
        $this->assertEquals('[10?]', $card->getAsString());
    }
}
