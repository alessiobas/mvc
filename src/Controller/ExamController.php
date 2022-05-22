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
use App\Entity\SweOrgsEmissions;
use App\Entity\SweOrgsEmissions2010;
use App\Entity\SweOrgsEmissions2012;
use App\Entity\SweOrgsEmissions2014;
use App\Entity\SweOrgsEmissions2016;

class ExamController extends AbstractController
{
    /**
     * @Route("/proj", name="proj-home")
     */
    public function index(
        ChartBuilderInterface $chartBuilder,
        SweOrgsEmissionsRepository $Repo2008,
        SweOrgsEmissions2010Repository $Repo2010,
        SweOrgsEmissions2012Repository $Repo2012,
        SweOrgsEmissions2014Repository $Repo2014,
        SweOrgsEmissions2016Repository $Repo2016,
    ): Response {
        $makeChart = new \App\ExamClasses\Charts();

        $dataSet2008 = $Repo2008->findAll();

        $dataSet2010 = $Repo2010->findAll();

        $dataSet2012 = $Repo2012->findAll();

        $dataSet2014 = $Repo2014->findAll();

        $dataSet2016 = $Repo2016->findAll();

        $chart = $makeChart->createHomeChart(
            $chartBuilder,
            $dataSet2008[0],
            $dataSet2010[0],
            $dataSet2012[0],
            $dataSet2014[0],
            $dataSet2016[0]
        );
        return $this->render('exam/index.html.twig', [
            'chart' => $chart,
            'dataset' => $dataSet2008[0],
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
    public function yearData(
        ChartBuilderInterface $chartBuilder,
        SweOrgsEmissionsRepository $Repo2008,
        SweOrgsEmissions2010Repository $Repo2010,
        SweOrgsEmissions2012Repository $Repo2012,
        SweOrgsEmissions2014Repository $Repo2014,
        SweOrgsEmissions2016Repository $Repo2016,
        int $dataYear
    ): Response {
        $makeChart = new \App\ExamClasses\Charts();
        if ($dataYear == 2008) {
            $dataSet = $Repo2008->findAll();
        } elseif ($dataYear == 2010) {
            $dataSet = $Repo2010->findAll();
        } elseif ($dataYear == 2012) {
            $dataSet = $Repo2012->findAll();
        } elseif ($dataYear == 2014) {
            $dataSet = $Repo2014->findAll();
        } elseif ($dataYear == 2016) {
            $dataSet = $Repo2016->findAll();
        } else {
            $dataSet = $Repo2008->findAll();
        }

        $chart1 = $makeChart->createBarChart($chartBuilder, $dataSet[0]);

        $chart2 = $makeChart->createPieChart($chartBuilder, $dataSet[0]);

        return $this->render('exam/data-year.html.twig', [
            'chart1' => $chart1,
            'chart2' => $chart2,
        ]);
    }

    /**
     * @Route("/proj/reset", name="proj-reset")
     */
    public function reset(
        ManagerRegistry $doctrine,
        ManagerRegistry $eManagerRegistry,
    ): Response {
        $entityManager = $doctrine->getManager();
        $data2008 = $entityManager->getRepository(SweOrgsEmissions::class)->findAll();

        $data2010 = $entityManager->getRepository(SweOrgsEmissions2010::class)->findAll();

        $data2012 = $entityManager->getRepository(SweOrgsEmissions2012::class)->findAll();

        $data2014 = $entityManager->getRepository(SweOrgsEmissions2014::class)->findAll();

        $data2016 = $entityManager->getRepository(SweOrgsEmissions2016::class)->findAll();

        $entityManager->remove($data2008[0]);
        $entityManager->remove($data2010[0]);
        $entityManager->remove($data2012[0]);
        $entityManager->remove($data2014[0]);
        $entityManager->remove($data2016[0]);
        $entityManager->flush();

        $sqlQuery = new \App\Sql\Sql();
        $sql2008 = $sqlQuery->sqlReset1();
        $sql2010 = $sqlQuery->sqlReset2();
        $sql2012 = $sqlQuery->sqlReset3();
        $sql2014 = $sqlQuery->sqlReset4();
        $sql2016 = $sqlQuery->sqlReset5();

        $stmt2008 = $eManagerRegistry->getConnection()->prepare($sql2008);
        $stmt2008->executeQuery()->fetchAllAssociative();

        $stmt2010 = $eManagerRegistry->getConnection()->prepare($sql2010);
        $stmt2010->executeQuery()->fetchAllAssociative();

        $stmt2012 = $eManagerRegistry->getConnection()->prepare($sql2012);
        $stmt2012->executeQuery()->fetchAllAssociative();

        $stmt2014 = $eManagerRegistry->getConnection()->prepare($sql2014);
        $stmt2014->executeQuery()->fetchAllAssociative();

        $stmt2016 = $eManagerRegistry->getConnection()->prepare($sql2016);
        $stmt2016->executeQuery()->fetchAllAssociative();

        return $this->render('exam/reset.html.twig');
    }
}
