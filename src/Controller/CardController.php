<?php

namespace App\Controller;

use App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    /**
     * @Route("/card", name="card-home")
     */
    public function card(): Response
    {
        return $this->render('card/card-home.html.twig');
    }

    /**
     * @Route("/card/deck", name="deck")
     */
    public function deck(): Response
    {
        $newDeck = new \App\Card\Deck();
        $newDeck->fillDeck();
        $data = [
            "title" => "Show deck with organized cards",
            "deck" => $newDeck->deck,
        ];
        return $this->render(
            'card/deck.html.twig',
            $data
        );
    }

    /**
     * @Route("/card/deck/shuffle", name="deck-shuffle")
     */
    public function deckShuffle(SessionInterface $session): Response
    {
        $newDeck = new \App\Card\Deck();
        $newDeck->fillDeck();
        $newDeck->shuffle();
        $data = [
            "title" => "Show shuffled deck",
            "deck" => $newDeck->deck,
        ];
        $session->clear();
        return $this->render(
            'card/deck.html.twig',
            $data
        );
    }

    /**
     * @Route("/card/deck/draw", name="draw-card")
     */
    public function drawCard(SessionInterface $session): Response
    {
        $newDeck = $session->get("newDeck") ?? new \App\Card\Deck();
        // $amountCardsLeft = count($newDeck->deck);
        $isSet = isset($amountCardsLeft);
        if (count($newDeck->deck) == 0) {
            $newDeck->fillDeck();
        }
        $newDeck->shuffle();
        $cardsLeft = $newDeck->drawCard(1);
        $amountCardsLeft = count($newDeck->deck);
        $session->set("newDeck", $newDeck);
        $data = [
            "title" => "Draw one card from deck",
            "cardsLeft" => $cardsLeft,
            "amountCardsLeft" => $amountCardsLeft
        ];
        return $this->render(
            'card/draw.html.twig',
            $data
        );
    }

    /**
     * @Route("/card/deck/draw/:{number}", name="draw-number")
     */
    public function drawSeveralCards(SessionInterface $session, $number): Response
    {
        $newDeck = $session->get("newDeck") ?? new \App\Card\Deck();
        if (count($newDeck->deck) == 0) {
            $newDeck->fillDeck();
        }
        $newDeck->shuffle();
        $cardsLeft = $newDeck->drawCard($number);
        $amountCardsLeft = count($newDeck->deck);
        $session->set("newDeck", $newDeck);
        $data = [
            "title" => "Draw several cards from deck",
            "cardsLeft" => $cardsLeft,
            "amountCardsLeft" => $amountCardsLeft
        ];
        return $this->render(
            'card/draw.html.twig',
            $data
        );
    }

    /**
     * @Route("/card/deck/deal/:{players}/:{cards}", name="deal-cards")
     */
    public function dealCards(SessionInterface $session, $players = 2, $cards = 2): Response
    {
        $newDeck = $session->get("newDeck") ?? new \App\Card\Deck();
        if (count($newDeck->deck) == 0) {
            $newDeck->fillDeck();
        }
        $newDeck->shuffle();
        $player = [];
        for ($i = 0; $i <= $players - 1; $i++) {
            $player[] = new \App\Card\Player($newDeck->drawCard($cards));
        }
        $amountCardsLeft = count($newDeck->deck);
        $amountPlayers = count($player);
        $session->set("newDeck", $newDeck);
        $data = [
            "title" => "Deal cards to players",
            "deck" => $newDeck->deck,
            "players" => $player,
            "amountCardsLeft" => $amountCardsLeft,
            "amountPlayers" => $amountPlayers
        ];
        return $this->render(
            'card/play.html.twig',
            $data
        );
    }

    /**
     * @Route("/card/deck2", name="deck2")
     */
    public function deck2(): Response
    {
        $newDeck = new \App\Card\DeckWith2Jokers();
        $newDeck->fillDeckWithJokers();
        $data = [
            "title" => "Show deck with Jokers",
            "deck" => $newDeck->deck,
        ];
        return $this->render(
            'card/deck.html.twig',
            $data
        );
    }
}
