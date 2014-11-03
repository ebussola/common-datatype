<?php
/**
 * Created by PhpStorm.
 * User: Leonardo Shinagawa
 * Date: 14/04/14
 * Time: 19:08
 */

class DateTimeTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        locale_set_default('pt_BR');
    }

    public function testDefaultLocaleUsPosix() {
        locale_set_default('en_US_POSIX');

        $datetime = new \ebussola\common\datatype\DateTime('2014-08-19 03:00:00');
        $datetime_str = (string) $datetime;

        $this->assertEquals('08/19/2014 03:00:00 am', $datetime_str);
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

    public function testUnavailableLanguageException() {
        $this->setExpectedException('\ebussola\common\datatype\exception\UnavailableLanguage');

        new \ebussola\common\datatype\DateTime('now', null, 'jp');
    }

    public function testInstantiationWithTimestamp()
    {
        $datetime = new \ebussola\common\datatype\DateTime(1415034405);
        $this->assertEquals(2014, $datetime->format('Y'));
        $this->assertEquals(11, $datetime->format('m'));
        $this->assertEquals(3, $datetime->format('d'));
        $this->assertEquals(15, $datetime->format('H'));
        $this->assertEquals(6, $datetime->format('i'));
        $this->assertEquals(45, $datetime->format('s'));
    }

}