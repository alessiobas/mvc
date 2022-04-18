<?php

namespace App\Controller;

use App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardControllerJson extends AbstractController
{
    /**
     * @Route("/card/api/deck", name="api-deck")
     */
    public function apiDeck(): Response
    {
        $newDeck = new \App\Card\Deck();
        $newDeck->fillDeck();
        return new JsonResponse($newDeck->deck);
    }
}