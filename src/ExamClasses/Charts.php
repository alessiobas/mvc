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
     * Creates line chart for comparison between years
     * to show data trend for different industries
     * @param object $chartbuilder
     * @param array $data2008
     * @param array $data2010
     * @param array $data2012
     * @param array $data2014
     * @param array $data2016
     * @return object $chart
     */
    public function createHomeChart(object $chartBuilder, $data2008, $data2010, $data2012, $data2014, $data2016): object {
        $chart = $chartBuilder->createChart(Chart::TYPE_LINE);

        $chart->setData([
            'labels' => ['2008', '2010', '2012', '2014', '2016'],
            'datasets' => [
                [
                    'label' => 'Jordbruk, skogsbruk och fiske',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [$data2008->getJordbruk(),
                    $data2010->getJordbruk(),
                    $data2012->getJordbruk(),
                    $data2014->getJordbruk(),
                    $data2016->getJordbruk()],
                ],
                [
                    'label' => 'Utvinning av mineral',
                    'backgroundColor' => 'rgb(0, 0, 255)',
                    'borderColor' => 'rgb(0, 0, 255)',
                    'data' => [$data2008->getMineral(),
                    $data2010->getMineral(),
                    $data2012->getMineral(),
                    $data2014->getMineral(),
                    $data2016->getMineral()],
                ],
                [
                    'label' => 'Tillverkningsindustri',
                    'backgroundColor' => 'rgb(60, 179, 113)',
                    'borderColor' => 'rgb(60, 179, 113)',
                    'data' => [$data2008->getTillverkningsindustrin(),
                    $data2010->getTillverkningsindustrin(),
                    $data2012->getTillverkningsindustrin(),
                    $data2014->getTillverkningsindustrin(),
                    $data2016->getTillverkningsindustrin()],
                ],
                [
                    'label' => 'El, gas och värmeverk samt vatten, avlopp och avfall',
                    'backgroundColor' => 'rgb(238, 130, 238)',
                    'borderColor' => 'rgb(238, 130, 238)',
                    'data' => [$data2008->getElochvatten(),
                    $data2010->getElochvatten(),
                    $data2012->getElochvatten(),
                    $data2014->getElochvatten(),
                    $data2016->getElochvatten()],
                ],
                [
                    'label' => 'Byggverksamhet',
                    'backgroundColor' => 'rgb(255, 165, 0)',
                    'borderColor' => 'rgb(255, 165, 0)',
                    'data' => [$data2008->getBygg(),
                    $data2010->getBygg(),
                    $data2012->getBygg(),
                    $data2014->getBygg(),
                    $data2016->getBygg()],
                ],
                [
                    'label' => 'Transportindustri',
                    'backgroundColor' => 'rgb(106, 90, 205)',
                    'borderColor' => 'rgb(106, 90, 205)',
                    'data' => [$data2008->getTransport(),
                    $data2010->getTransport(),
                    $data2012->getTransport(),
                    $data2014->getTransport(),
                    $data2016->getTransport()],
                ],
                [
                    'label' => 'Övriga tjänster',
                    'backgroundColor' => 'rgb(167, 180, 174)',
                    'borderColor' => 'rgb(167, 180, 174)',
                    'data' => [$data2008->getOvrigt(),
                    $data2010->getOvrigt(),
                    $data2012->getOvrigt(),
                    $data2014->getOvrigt(),
                    $data2016->getOvrigt()],
                ],
                [
                    'label' => 'Offentlig sektor',
                    'backgroundColor' => 'rgb(0, 180, 174)',
                    'borderColor' => 'rgb(0, 180, 174)',
                    'data' => [$data2008->getOffentligsektor(),
                    $data2010->getOffentligsektor(),
                    $data2012->getOffentligsektor(),
                    $data2014->getOffentligsektor(),
                    $data2016->getOffentligsektor()],
                ],
                [
                    'label' => 'Hushåll och ideella föreningar',
                    'backgroundColor' => 'rgb(188, 67, 0)',
                    'borderColor' => 'rgb(188, 67, 0)',
                    'data' => [$data2008->getHushalletc(),
                    $data2010->getHushalletc(),
                    $data2012->getHushalletc(),
                    $data2014->getHushalletc(),
                    $data2016->getHushalletc()],
                ],
            ],
        ]);

        $chart->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 500,
                    'suggestedMax' => 16000,
                ],
            ],
        ]);

        return $chart;
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
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(0, 0, 255)',
                        'rgb(60, 179, 113)',
                        'rgb(238, 130, 238)',
                        'rgb(255, 165, 0)',
                        'rgb(106, 90, 205)',
                        'rgb(167, 180, 174)',
                        'rgb(0, 180, 174)',
                        'rgb(188, 67, 0)',
                    ],
                ],
            ],
        ]);

        $chart->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 500,
                    'suggestedMax' => 16000,
                ],
            ],
        ]);

        return $chart;
    }

    /**
     * Creates Pie chart for selected year to show data on different industries
     * @param object $chartbuilder
     * @param array $data
     * @return object $chart
     */
    public function createPieChart(object $chartBuilder, $data): object {
        $chart = $chartBuilder->createChart(Chart::TYPE_PIE);

        $chart->setData([
            'labels' => ['Jordbruk, skogsbruk och fiske', 'Utvinning av mineral', 'Tillverkningsindustri', 'El, gas och värmeverk samt vatten, avlopp och avfall', 'Byggverksamhet', 'Transportindustri', 'Övriga tjänster', 'Offentlig sektor', 'Hushåll och ideella föreningar'],
            'datasets' => [
                [
                    'label' => 'Utsläpp av växthusgaser från svenska ekonomiska aktörer, tusen ton koldioxidekvivalenter',
                    'data' => [$data->getJordbruk(),
                    $data->getMineral(),
                    $data->getTillverkningsindustrin(),
                    $data->getElochvatten(),
                    $data->getBygg(),
                    $data->getTransport(),
                    $data->getOvrigt(),
                    $data->getOffentligsektor(),
                    $data->getHushalletc()],
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(0, 0, 255)',
                        'rgb(60, 179, 113)',
                        'rgb(238, 130, 238)',
                        'rgb(255, 165, 0)',
                        'rgb(106, 90, 205)',
                        'rgb(167, 180, 174)',
                        'rgb(0, 180, 174)',
                        'rgb(188, 67, 0)',
                    ],
                    'hoverOffset' => 4,
                ],
            ],
        ]);

        return $chart;
    }
}