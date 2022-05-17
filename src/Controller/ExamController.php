<?php

namespace App\Controller;

use App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ExamController extends AbstractController
{
    /**
     * @Route("/proj", name="proj-home")
     */
    public function index(): Response
    {
        return $this->render('exam/index.html.twig');
    }
}