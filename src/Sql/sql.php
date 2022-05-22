<?php

namespace App\Sql;

class Sql
{
    public function sqlReset1()
    {
        $sqlQuery1 = 'INSERT INTO swe_orgs_emissions(jordbruk,
        mineral,
        tillverkningsindustrin,
        elochvatten,
        bygg,
        transport,
        ovrigt,
        offentligsektor,
        hushalletc,
        total)
        VALUES (9509,797,18367,10248,1940,14899,4130,863,11392,72145)';

        return $sqlQuery1;
    }

    public function sqlReset2()
    {
        $sqlQuery2 = 'INSERT INTO swe_orgs_emissions2010(jordbruk,
        mineral,
        tillverkningsindustrin,
        elochvatten,
        bygg,
        transport,
        ovrigt,
        offentligsektor,
        hushalletc,
        total)
        VALUES (9394,908,17606,12974,2024,14085,4140,877,11098,73105)';

        return $sqlQuery2;
    }

    public function sqlReset3()
    {
        $sqlQuery3 = 'INSERT INTO swe_orgs_emissions2012(jordbruk,
        mineral,
        tillverkningsindustrin,
        elochvatten,
        bygg,
        transport,
        ovrigt,
        offentligsektor,
        hushalletc,
        total)
        VALUES (9188,944,15785,9892,1996,12519,3829,823,9947,64922)';

        return $sqlQuery3;
    }

    public function sqlReset4()
    {
        $sqlQuery4 = 'INSERT INTO swe_orgs_emissions2014(jordbruk,
        mineral,
        tillverkningsindustrin,
        elochvatten,
        bygg,
        transport,
        ovrigt,
        offentligsektor,
        hushalletc,
        total)
        VALUES (9318,985,14833,8572,1910,12333,3585,722,9758,62014)';

        return $sqlQuery4;
    }

    public function sqlReset5()
    {
        $sqlQuery5 = 'INSERT INTO swe_orgs_emissions2016(jordbruk,
        mineral,
        tillverkningsindustrin,
        elochvatten,
        bygg,
        transport,
        ovrigt,
        offentligsektor,
        hushalletc,
        total)
        VALUES (9041,1084,14946,8590,1902,12969,3469,721,9588,62309)';

        return $sqlQuery5;
    }
}
