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
     * Construct object, fill with data and verify that object is not empty
     */
    public function testCreateBarChart()
    {
        // $charts = new App\Controller\ExamController();
        // $charts = new App\ExamClasses\Charts();
        // // $this->assertInstanceOf("\App\Controller\ExamController", $charts);


        // $dataSet2008 = ["jordbruk" => 9188, "mineral" => 944, "tillverkningsindustrin" => 15785, "elochvatten" => 9892, "bygg" => 1996, "transport" => 12519, "ovrigt" => 3829, "offentligsektor" => 823, "hushalletc" => 9947, "total" => 23344];

        // $dataSet2008 = [["jordbruk" => 9188, "mineral" => 944, "tillverkningsindustrin" => 15785, "elochvatten" => 9892, "bygg" => 1996, "transport" => 12519, "ovrigt" => 3829, "offentligsektor" => 823, "hushalletc" => 9947, "total" => 23344]];
        // $dataSet2010 = [["jordbruk" => 9188, "mineral" => 944, "tillverkningsindustrin" => 15785, "elochvatten" => 9892, "bygg" => 1996, "transport" => 12519, "ovrigt" => 3829, "offentligsektor" => 823, "hushalletc" => 9947, "total" => 23344]];
        // $dataSet2012 = [["jordbruk" => 9188, "mineral" => 944, "tillverkningsindustrin" => 15785, "elochvatten" => 9892, "bygg" => 1996, "transport" => 12519, "ovrigt" => 3829, "offentligsektor" => 823, "hushalletc" => 9947, "total" => 23344]];
        // $dataSet2014 = [["jordbruk" => 9188, "mineral" => 944, "tillverkningsindustrin" => 15785, "elochvatten" => 9892, "bygg" => 1996, "transport" => 12519, "ovrigt" => 3829, "offentligsektor" => 823, "hushalletc" => 9947, "total" => 23344]];
        // $dataSet2016 = [["jordbruk" => 9188, "mineral" => 944, "tillverkningsindustrin" => 15785, "elochvatten" => 9892, "bygg" => 1996, "transport" => 12519, "ovrigt" => 3829, "offentligsektor" => 823, "hushalletc" => 9947, "total" => 23344]];


        // $dataSet2008 = [[9188, 944, 15785, 9892, 1996, 12519, 3829, 823, 9947, 23344]];
        // $dataSet2010 = [[9188, 944, 15785, 9892, 1996, 12519, 3829, 823, 9947, 23344]];
        // $dataSet2012 = [[9188, 944, 15785, 9892, 1996, 12519, 3829, 823, 9947, 23344]];
        // $dataSet2014 = [[9188, 944, 15785, 9892, 1996, 12519, 3829, 823, 9947, 23344]];
        // $dataSet2016 = [[9188, 944, 15785, 9892, 1996, 12519, 3829, 823, 9947, 23344]];
        $dbMock = $this->getMockBuilder(App\Entity\SweOrgsEmissions::class)->setMethods(['getJordbruk'])->getMock();

        $mockData = new App\ExamClasses\Charts();
        // $mockData->data = [[9188, 944, 15785, 9892, 1996, 12519, 3829, 823, 9947, 23344]];

        $dbMock->method('getJordbruk')->willReturn(9188);

        // $test = new 
        // $chartBuilder = $this->getMockBuilder(ChartBuilderInterface::class);
        // $chart = $charts->createHomeChart($chartBuilder, $dataSet2008, $dataSet2010, $dataSet2012, $dataSet2014, $dataSet2016);

        $chartBuilder = $this->getMockBuilder(Symfony\UX\Chartjs\Builder\ChartBuilderInterface::class)
        ->getMock();
        // $chart = $charts->createBarChart($chartBuilder, $dataSet2008);
        $chart = $mockData->createBarChart($chartBuilder, $dbMock);
        $this->assertNotEmpty($chart);
    }

    /**
     * Construct object, fill with data and verify that object is not empty
     */
    public function testCreateHomeChart()
    {
        $dbMock08 = $this->getMockBuilder(App\Entity\SweOrgsEmissions::class)->setMethods(['getJordbruk'])->getMock();

        $dbMock10 = $this->getMockBuilder(App\Entity\SweOrgsEmissions2010::class)->setMethods(['getJordbruk'])->getMock();

        $dbMock12 = $this->getMockBuilder(App\Entity\SweOrgsEmissions2012::class)->setMethods(['getJordbruk'])->getMock();

        $dbMock14 = $this->getMockBuilder(App\Entity\SweOrgsEmissions2014::class)->setMethods(['getJordbruk'])->getMock();

        $dbMock16 = $this->getMockBuilder(App\Entity\SweOrgsEmissions2016::class)->setMethods(['getJordbruk'])->getMock();

        $mockData = new App\ExamClasses\Charts();

        $dbMock08->method('getJordbruk')->willReturn(9188);

        $dbMock10->method('getJordbruk')->willReturn(7594);

        $dbMock12->method('getJordbruk')->willReturn(3455);

        $dbMock14->method('getJordbruk')->willReturn(6432);

        $dbMock16->method('getJordbruk')->willReturn(7688);

        $chartBuilder = $this->getMockBuilder(Symfony\UX\Chartjs\Builder\ChartBuilderInterface::class)
        ->getMock();

        $chart = $mockData->createHomeChart($chartBuilder, $dbMock08, $dbMock10, $dbMock12,$dbMock14, $dbMock16);
        $this->assertNotEmpty($chart);
    }

    /**
     * Construct object, fill with data and verify that object is not empty
     */
    public function testCreatePieChart()
    {
        $dbMock = $this->getMockBuilder(App\Entity\SweOrgsEmissions::class)->setMethods(['getJordbruk'])->getMock();

        $mockData = new App\ExamClasses\Charts();

        $dbMock->method('getJordbruk')->willReturn(9188);

        $chartBuilder = $this->getMockBuilder(Symfony\UX\Chartjs\Builder\ChartBuilderInterface::class)
        ->getMock();

        $chart = $mockData->createPieChart($chartBuilder, $dbMock);
        $this->assertNotEmpty($chart);
    }
}