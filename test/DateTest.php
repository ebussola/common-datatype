<?php
/**
 * Created by PhpStorm.
 * User: Leonardo Shinagawa
 * Date: 14/04/14
 * Time: 19:07
 */

class DateTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        locale_set_default('pt_BR');
    }

    public function testToString() {
        $date = new \ebussola\common\datatype\datetime\Date('2014-04-16');
        $this->assertEquals('16/04/2014', (string)$date);
    }

    public function testInstantiationWithTimestamp()
    {
        $datetime = new \ebussola\common\datatype\datetime\Date(1415034405);
        $this->assertEquals(2014, $datetime->format('Y'));
        $this->assertEquals(11, $datetime->format('m'));
        $this->assertEquals(3, $datetime->format('d'));
        $this->assertEquals(0, $datetime->format('H'));
        $this->assertEquals(0, $datetime->format('i'));
        $this->assertEquals(0, $datetime->format('s'));
    }

}