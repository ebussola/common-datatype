<?php

/**
 * Created by PhpStorm.
 * User: Leonardo Shinagawa
 * Date: 21/04/14
 * Time: 22:39
 */
class NumberVariationTest extends PHPUnit_Framework_TestCase
{

    public function testGeneralUse()
    {
        $vari = new \ebussola\common\datatype\number\NumberVariation(0, 10, 5);

        $this->assertTrue($vari->isEqual(5));
        $this->assertTrue($vari->isEqual(10));
        $this->assertTrue($vari->isEqual(-3));
        $this->assertTrue($vari->isEqual(-5));

        $this->assertFalse($vari->isEqual(11));
        $this->assertFalse($vari->isEqual(-6));

        $this->assertTrue($vari->isGreater(-10));
        $this->assertTrue($vari->isLess(15));
    }

}
 