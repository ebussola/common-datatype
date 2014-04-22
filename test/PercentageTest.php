<?php
/**
 * Created by PhpStorm.
 * User: Leonardo Shinagawa
 * Date: 21/04/14
 * Time: 22:49
 */

class PercentageTest extends PHPUnit_Framework_TestCase {

    public function testGeneralUse() {
        $percent = new \ebussola\common\datatype\number\Percentage(10);
        $this->assertEquals('10,00%', (string)$percent);

        $percent->setShowSymbol(false);
        $this->assertEquals('10,00', (string)$percent);

        $number = $percent->of(100);
        $this->assertEquals(10, $number->getValue());
        $this->assertInstanceOf('\ebussola\common\datatype\Number', $number);

        $currency = $percent->of(new \ebussola\common\datatype\number\Currency(100));
        $this->assertEquals(10, $currency->getValue());
        $this->assertInstanceOf('\ebussola\common\datatype\number\Currency', $currency);
    }

}