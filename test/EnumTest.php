<?php
/**
 * Created by PhpStorm.
 * User: shina
 * Date: 21/04/14
 * Time: 12:07
 */

class EnumTest extends PHPUnit_Framework_TestCase {

    public function testGeneralUse() {
        $enum = new EnumStub();
        $this->assertFalse($enum->isValid());

        $enum = new EnumStub('STRING');
        $this->assertTrue($enum->isValid());
        $this->assertEquals(2, $enum->getIndex());
        $this->assertEquals('STRING', (string)$enum);
        $this->assertEquals('STRING', $enum->get());
        $this->assertTrue(is_array($enum->defaults()));
    }

    public function testException() {
        $this->setExpectedException('\ebussola\common\datatype\exception\InvalidEnum');

        $enum = new EnumStub('INVALID');
        $enum->isValid(true);
    }

    public function testInvalidEnum() {
        $enum = new EnumStub('INVALID');

        try {
            $enum->isValid(true);
        } catch (\ebussola\common\datatype\exception\InvalidEnum $e) {
            $this->assertEquals('INVALID', $e->chosen);
            $this->assertEquals([2=>'STRING', 3=>'INTEGER', 5=>'FLOAT', 0=>'BOOLEAN'], $e->available_options);
        }
    }

}