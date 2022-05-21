<?php

namespace App\Controller;

use App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;
use App\Repository\SweOrgsEmissionsRepository;
use App\Repository\SweOrgsEmissions2010Repository;
use App\Repository\SweOrgsEmissions2012Repository;
use App\Repository\SweOrgsEmissions2014Repository;
use App\Repository\SweOrgsEmissions2016Repository;
use Doctrine\Persistence\ManagerRegistry;

class ExamController extends AbstractController
{
    /**
     * @Route("/proj", name="proj-home")
     */
    public function index(ChartBuilderInterface $chartBuilder,
    SweOrgsEmissionsRepository $Repo2008,
    SweOrgsEmissions2010Repository $Repo2010,
    SweOrgsEmissions2012Repository $Repo2012,
    SweOrgsEmissions2014Repository $Repo2014,
    SweOrgsEmissions2016Repository $Repo2016,
    ): Response
    {
        $makeChart = new \App\ExamClasses\Charts();

        $dataSet2008 = $Repo2008->findAll();

        $dataSet2010 = $Repo2010->findAll();

        $dataSet2012 = $Repo2012->findAll();

        $dataSet2014 = $Repo2014->findAll();

        $dataSet2016 = $Repo2016->findAll();

        $chart = $makeChart->createHomeChart($chartBuilder, $dataSet2008[0], $dataSet2010[0], $dataSet2012[0], $dataSet2014[0], $dataSet2016[0], );
        return $this->render('exam/index.html.twig', [
            'chart' => $chart,
        ]);
    }


    /**
     * @Route("/proj/about", name="proj-about")
     */
    public function about(): Response
    {
        return $this->render('exam/about.html.twig');
    }

    /**
     * @Route("/proj{dataYear}", name="proj-data-year")
     */
    public function yearData(ChartBuilderInterface $chartBuilder,
    SweOrgsEmissionsRepository $Repo2008,
    SweOrgsEmissions2010Repository $Repo2010,
    SweOrgsEmissions2012Repository $Repo2012,
    SweOrgsEmissions2014Repository $Repo2014,
    SweOrgsEmissions2016Repository $Repo2016,
    int $dataYear
    ): Response
    {
        $makeChart = new \App\ExamClasses\Charts();
        if ($dataYear == 2008) {
            $dataSet = $Repo2008->findAll();
        }
        if ($dataYear == 2010) {
            $dataSet = $Repo2010->findAll();
        }
        if ($dataYear == 2012) {
            $dataSet = $Repo2012->findAll();
        }
        if ($dataYear == 2014) {
            $dataSet = $Repo2014->findAll();
        }
        if ($dataYear == 2016) {
            $dataSet = $Repo2016->findAll();
        }

        $chart = $makeChart->createBarChart($chartBuilder, $dataSet[0]);
        return $this->render('exam/index.html.twig', [
            'chart' => $chart,
        ]);
    }
}