<?php
use ebussola\common\datatype\Number;

/**
 * Created by PhpStorm.
 * User: Leonardo Shinagawa
 * Date: 21/04/14
 * Time: 21:18
 */

class NumberTest extends PHPUnit_Framework_TestCase {

    public function testSetValue() {
        $num = new Number(0);
        $this->assertEquals(0, $num->getValue());

        $num->setValue('1,90');
        $this->assertEquals(1.9, $num->getValue());

        $num->setValue('1.800,55');
        $this->assertEquals(1800.55, $num->getValue());

        $num->setValue('nonono3455.90');
        $this->assertEquals(3455.9, $num->getValue());

        $num->setValue(-50);
        $this->assertEquals(-50, $num->getValue());

    }

    public function testSetDecimal() {
        $num = new Number(pi());
        $num->setDecimals(2);
        $this->assertEquals('3,14', (string)$num);

        $num->setDecimals(10);
        $this->assertEquals('3,1415926536', (string)$num);
    }

    public function testMath() {
        $num = new Number(5);
        $num->bcadd(5);
        $this->assertEquals(10, $num->getValue());

        $num->bcdiv(2);
        $this->assertEquals(5, $num->getValue());

        $num->bcmul(3);
        $this->assertEquals(15, $num->getValue());

        $num->bcsub(3);
        $this->assertEquals(12, $num->getValue());

        $num->bcadd(3)->bcsub(10);
        $this->assertEquals(5, $num->getValue());
    }

    public function testComparisons() {
        $num = new Number(5);

        $this->assertTrue($num->isPositive());
        $this->assertFalse($num->isNegative());
        $this->assertFalse($num->isZero());
        $this->assertTrue($num->isGreater(4));
        $this->assertFalse($num->isLess(4));
        $this->assertTrue($num->isEqual(5));

        $num->setValue(0);

        $this->assertTrue($num->isZero());
        $this->assertFalse($num->isPositive());
        $this->assertFalse($num->isNegative());
    }

    public function testPercentageMethods() {
        $num = new Number(50);
        $percent = $num->of(100);
        $this->assertEquals(50, $percent->getValue());

        $another_num = $num->is($percent);
        $this->assertEquals(100, $another_num->getValue());
    }

    public function testPercentageIntegrations()
    {
        $percent = new \ebussola\common\datatype\number\Percentage(15);
        $number = new \ebussola\common\datatype\Number(500);
        $this->assertEquals('575,00', (string)$number->bcadd($percent));

        $percent = new \ebussola\common\datatype\number\Percentage(15);
        $number = new \ebussola\common\datatype\Number(500);
        $this->assertEquals('425,00', (string)$number->bcsub($percent));

        $percent = new \ebussola\common\datatype\number\Percentage(15);
        $number = new \ebussola\common\datatype\Number(500);
        $this->assertEquals('37.500,00', (string)$number->bcmul($percent));

        $percent = new \ebussola\common\datatype\number\Percentage(15);
        $number = new \ebussola\common\datatype\Number(500);
        $this->assertEquals('6,67', (string)$number->bcdiv($percent));
    }

    public function testPreserve() {
        $num = new Number(123);
        $new_num = $num->preserve()->bcsub(23);

        $this->assertEquals(123, $num->getValue());
        $this->assertEquals(100, $new_num->getValue());
    }

}
 