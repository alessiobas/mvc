<?php

namespace App\Controller;

use App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

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
     * @Route("/game21", name="game21", methods={"GET", "HEAD"})
     */
    public function game21(SessionInterface $session): Response
    {
        $game = new \App\Card\Game();
        $game = $session->get("game") ?? new \App\Card\Game();
        $finished = $session->get("finished") ?? false;
        $session->set("game", $game);
        $session->set("finished", $finished);
        $data = [
            "title" => "Game 21 playing",
            "playerHand" => $game->player->hand,
            "bankHand" => $game->bank->hand,
            "playerScore" => $game->playerScore,
            "bankScore" => $game->bankScore,
            "finished" => $finished,
            "result" => $game->res
        ];
        return $this->render('card/game21.html.twig', $data);
    }

    /**
     * @Route("/game21", name="game21-process", methods={"POST"})
     */
    public function game21Process(SessionInterface $session, Request $request): Response
    {
        $game = $session->get("game");
        $turn = $session->get("finished");
        $action = $request->request->get("action");

        if ($action == "1") {
            $game->playPlayer();
        }

        if ($action == "2") {
            $game->playBank();
            $session->set("finished", true);
            $res = $game->checkWinner();
        }

        if ($action == "3") {
            $game->newRound();
            $action = "0";
            $session->clear();
        }

        if ($action == "4") {
            $game->playerScore = $game->playerScore - 13;
            $action = "0";
        }

        return $this->redirectToRoute('game21');
    }
}