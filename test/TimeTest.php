<?php
/**
 * Created by PhpStorm.
 * User: shina
 * Date: 20/04/14
 * Time: 13:11
 */

class TimeTest extends PHPUnit_Framework_TestCase {

    public function testToString() {
        locale_set_default('pt_BR');
        $time = new \ebussola\common\datatype\datetime\Time('13:15:20');

        $this->assertEquals('13:15:20', (string)$time);
    }

}