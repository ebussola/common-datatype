<?php
/**
 * Created by PhpStorm.
 * User: Leonardo Shinagawa
 * Date: 21/04/14
 * Time: 22:33
 */

class InfinityTest extends PHPUnit_Framework_TestCase {

    public function testGeneralUse() {
        $infinity = new \ebussola\common\datatype\number\Infinity('+');
        $this->assertTrue($infinity->isPositive());
        $infinity = new \ebussola\common\datatype\number\Infinity('-');
        $this->assertTrue($infinity->isNegative());
    }

}