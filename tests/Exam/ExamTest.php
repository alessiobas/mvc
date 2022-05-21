<?php

// namespace App\ExamClasses;

use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;
use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Charts.
 */
class ExamTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties, use no arguments.
     */
    public function testCreateChart()
    {
        $charts = new App\ExamClasses\Charts();
        $this->assertInstanceOf("\App\ExamClasses\Charts", $charts);

        $this->assertNotEmpty($charts);
    }

    /**
     * Construct object, fill with data and verify that object is created
     */
    public function testCreateHomeChart()
    {
        // $charts = new App\Controller\ExamController();
        $charts = new App\ExamClasses\Charts();
        // $this->assertInstanceOf("\App\Controller\ExamController", $charts);

        // $dataSet2008 = [["jordbruk" => 9188, "mineral" => 944, "tillverkningsindustrin" => 15785, "elochvatten" => 9892, "bygg" => 1996, "transport" => 12519, "ovrigt" => 3829, "offentligsektor" => 823, "hushalletc" => 9947, "total" => 23344]];
        // $dataSet2010 = [["jordbruk" => 9188, "mineral" => 944, "tillverkningsindustrin" => 15785, "elochvatten" => 9892, "bygg" => 1996, "transport" => 12519, "ovrigt" => 3829, "offentligsektor" => 823, "hushalletc" => 9947, "total" => 23344]];
        // $dataSet2012 = [["jordbruk" => 9188, "mineral" => 944, "tillverkningsindustrin" => 15785, "elochvatten" => 9892, "bygg" => 1996, "transport" => 12519, "ovrigt" => 3829, "offentligsektor" => 823, "hushalletc" => 9947, "total" => 23344]];
        // $dataSet2014 = [["jordbruk" => 9188, "mineral" => 944, "tillverkningsindustrin" => 15785, "elochvatten" => 9892, "bygg" => 1996, "transport" => 12519, "ovrigt" => 3829, "offentligsektor" => 823, "hushalletc" => 9947, "total" => 23344]];
        // $dataSet2016 = [["jordbruk" => 9188, "mineral" => 944, "tillverkningsindustrin" => 15785, "elochvatten" => 9892, "bygg" => 1996, "transport" => 12519, "ovrigt" => 3829, "offentligsektor" => 823, "hushalletc" => 9947, "total" => 23344]];


        $dataSet2008 = [[9188, 944, 15785, 9892, 1996, 12519, 3829, 823, 9947, 23344]];
        $dataSet2010 = [[9188, 944, 15785, 9892, 1996, 12519, 3829, 823, 9947, 23344]];
        $dataSet2012 = [[9188, 944, 15785, 9892, 1996, 12519, 3829, 823, 9947, 23344]];
        $dataSet2014 = [[9188, 944, 15785, 9892, 1996, 12519, 3829, 823, 9947, 23344]];
        $dataSet2016 = [[9188, 944, 15785, 9892, 1996, 12519, 3829, 823, 9947, 23344]];



        // $chartBuilder = $this->getMockBuilder(ChartBuilderInterface::class);
        // $chart = $charts->createHomeChart($chartBuilder, $dataSet2008, $dataSet2010, $dataSet2012, $dataSet2014, $dataSet2016);

        $chartBuilder = $this->getMockBuilder(Symfony\UX\Chartjs\Builder\ChartBuilderInterface::class)->getMock();
        // $chart = $charts->createBarChart($chartBuilder, $dataSet2008);
        $chart = $charts->createHomeChart($chartBuilder, $dataSet2008[0], $dataSet2010[0], $dataSet2012[0], $dataSet2014[0], $dataSet2016[0]);
        $this->assertNotEmpty($chart);
    }
}