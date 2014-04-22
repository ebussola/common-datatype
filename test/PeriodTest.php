<?php
use ebussola\common\datatype\datetime\Date;
use ebussola\common\datatype\datetime\Time;

/**
 * Created by PhpStorm.
 * User: shina
 * Date: 20/04/14
 * Time: 13:33
 */

class PeriodTest extends PHPUnit_Framework_TestCase {

    public function testGeneralUse() {
        locale_set_default('en_US');
        $period = new \ebussola\common\datatype\datetime\Period(new Date('2014-04-01'), 1, new Date('2014-04-5'));

        $i = 1;
        foreach ($period as $date) {
            switch ($i) {
                case 1 :
                    $this->assertEquals('04/01/2014', (string)$date);
                    break;
                case 2 :
                    $this->assertEquals('04/02/2014', (string)$date);
                    break;
                case 3 :
                    $this->assertEquals('04/03/2014', (string)$date);
                    break;
                case 4 :
                    $this->assertEquals('04/04/2014', (string)$date);
                    break;
                case 5 :
                    $this->assertEquals('04/05/2014', (string)$date);
                    break;
            }

            $i++;
        }

        $this->assertCount(5, $period);
    }

    public function testEndDateIncremental() {
        $period = new \ebussola\common\datatype\datetime\Period(new Date('2014-04-01'), 1, 4);
        $this->assertCount(5, $period);
    }

    public function testPeriodByTime() {
        locale_set_default('pt_BR');
        $period = new \ebussola\common\datatype\datetime\Period(new Time('13:00'), new DateInterval('PT1H'), new Time('18:00'));

        $i = 1;
        foreach ($period as $time) {
            switch ($i) {
                case 1 :
                    $this->assertEquals('13:00:00', (string)$time);
                    break;
                case 2 :
                    $this->assertEquals('14:00:00', (string)$time);
                    break;
                case 3 :
                    $this->assertEquals('15:00:00', (string)$time);
                    break;
                case 4 :
                    $this->assertEquals('16:00:00', (string)$time);
                    break;
                case 5 :
                    $this->assertEquals('17:00:00', (string)$time);
                    break;
                case 6 :
                    $this->assertEquals('18:00:00', (string)$time);
                    break;
            }

            $i++;
        }

        $this->assertCount(6, $period);
    }

}