<?php
/**
 * Created by PhpStorm.
 * User: shina
 * Date: 14/04/14
 * Time: 19:08
 */

class DateTimeTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        locale_set_default('pt_BR');
    }

    public function testToString() {
        $datetime = new \ebussola\common\datatype\DateTime('2014-08-19 03:00:00');
        $datetime_str = (string) $datetime;

        $this->assertEquals('19/08/2014 03:00:00', $datetime_str);
    }

    public function testFormat() {
        $datetime = new \ebussola\common\datatype\DateTime('2014-08-19 03:10:25');

        $this->assertEquals($datetime->format('Y'), '2014');
        $this->assertEquals($datetime->format('m'), '08');
        $this->assertEquals($datetime->format('d'), '19');
        $this->assertEquals($datetime->format('H'), '03');
        $this->assertEquals($datetime->format('i'), '10');
        $this->assertEquals($datetime->format('s'), '25');

        $this->assertEquals($datetime->format('F'), 'Agosto');
    }

    public function testSerialize() {
        $datetime = new \ebussola\common\datatype\DateTime('2014-08-19 03:10:25');

        $this->assertEquals('C:33:"ebussola\common\datatype\DateTime":25:{2014-08-19T03:10:25-03:00}', serialize($datetime));

        $serial = serialize($datetime);
        $datetime2 = unserialize($serial);

        $this->assertEquals((string)$datetime, (string)$datetime2);
    }

}