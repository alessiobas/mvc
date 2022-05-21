<?php

/**
 * This file contains class Charts that is part of presenting data in charts in project
 */

namespace App\ExamClasses;

use App\Controller;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;


/**
 * Charts class which creates charts for presenting data from database
 */
class Charts
{
    /**
     * Empty constructor
     */
    public function __construct()
    {
    }

    /**
     * Creates bar chart for selected year to show data on different industries
     * @param object $chartbuilder
     * @param array $data
     * @return object $chart
     */
    public function createBarChart(object $chartBuilder, $data): object {
        $chart = $chartBuilder->createChart(Chart::TYPE_BAR);

        $chart->setData([
            'labels' => ['Jordbruk, skogsbruk och fiske', 'Utvinning av mineral', 'Tillverkningsindustri', 'El, gas och värmeverk samt vatten, avlopp och avfall', 'Byggverksamhet', 'Transportindustri', 'Övriga tjänster', 'Offentlig sektor', 'Hushåll och ideella föreningar'],
            'datasets' => [
                [
                    'label' => 'Utsläpp av växthusgaser från svenska ekonomiska aktörer, tusen ton koldioxidekvivalenter',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [$data->getJordbruk(),
                    $data->getMineral(),
                    $data->getTillverkningsindustrin(),
                    $data->getElochvatten(),
                    $data->getBygg(),
                    $data->getTransport(),
                    $data->getOvrigt(),
                    $data->getOffentligsektor(),
                    $data->getHushalletc()],
                ],
            ],
        ]);

        $chart->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 500,
                    'suggestedMax' => 20000,
                ],
            ],
        ]);

        return $chart;
    }
}