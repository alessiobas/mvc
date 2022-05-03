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
        $deck = new Deck();
        $this->assertInstanceOf("\App\Card\Deck", $deck);

        $this->assertNotEmpty($deck);
    }

    /**
     * Fill deck with cards and test if deck contains the right amount
     * of cards
     */
    public function testFillDeck()
    {
        $deck = new Deck();
        $this->assertInstanceOf("\App\Card\Deck", $deck);

        $this->assertNotEmpty($deck);
        $deck->fillDeck();
        $amountOfCards = 52;
        $amountOfCardsFilled = count($deck->deck);
        $this->assertEquals($amountOfCards, $amountOfCardsFilled);
    }

    /**
     * Fill deck with cards, shuffle and verify deck is shuffled by
     * testing if 10th card has same value and color as string value before and after shuffle
     */
    public function testShuffleDeck()
    {
        $deck = new Deck();
        $deck->fillDeck();
        $firstRes = $deck->deck[10]->getAsString();
        // print_r($firstRes);
        $deck->shuffle();
        $secondRes = $deck->deck[10]->getAsString();
        $this->assertNotEquals($firstRes, $secondRes);
    }

    /**
     * Create empty Object, add a card to it, verify that cards
     * value equals added cards value and that amount of cards are 53 after filled
     */
    public function testAddCardToDeck()
    {
        $deck = new Deck();
        $card = new Card(10, "Hearts");
        $deck->addACard($card);
        $checkValue = 10;
        $cardValue = $deck->deck[0]->value;
        $this->assertEquals($checkValue, $cardValue);
        $deck->fillDeck();
        $amountOfCards = 53;
        $amountOfCardsFilled = count($deck->deck);
        $this->assertEquals($amountOfCards, $amountOfCardsFilled);
    }

    /**
     * Create Object, fill with cards and verify that one card can be drawn
     * and several cards can be drawn
     */
    public function testDrawCardsFromDeck()
    {
        $deck = new Deck();
        $deck->fillDeck();
        $this->assertInstanceOf("\App\Card\Deck", $deck);
        $oneCard = $deck->drawCard();
        $moreCards = $deck->drawCard(5);
        $this->assertEquals(1, count($oneCard));
        $this->assertEquals(5, count($moreCards));
    }
}