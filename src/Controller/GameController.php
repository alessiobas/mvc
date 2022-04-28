<?php

namespace App\Controller;

use App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    /**
     * @Route("/game", name="game")
     */
    public function game(): Response
    {
        return $this->render('card/game.html.twig');
    }

    /**
     * @Route("/game/doc", name="doc")
     */
    public function doc(): Response
    {
        return $this->render('card/doc.html.twig');
    }

    /**
     * @Route("/game21", name="game21")
     */
    public function game21(SessionInterface $session): Response
    {
        $game = new \App\Card\Game(0, 0);
        $game = $session->get("game") ?? new \App\Card\Game();
        $turn = $session->get("turn") ?? 0;
        $session->set("game", $game);
        $session->set("turn", $turn);
        $data = [
            "title" => "Game 21 playing",
            "playerHand" => $game->player->hand,
            "bankHand" => $game->bank->hand,
            "playerScore" => $game->playerScore,
            "bankScore" => $game->bankScore,
            "turn" => $turn
        ];
        return $this->render('card/game21.html.twig', $data);
    }
}