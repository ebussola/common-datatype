<?php
/**
 * Created by PhpStorm.
 * User: Leonardo Shinagawa
 * Date: 22/04/14
 * Time: 08:21
 */

class StringTest extends PHPUnit_Framework_TestCase {

    public function testGeneralUse() {
        $str = new \ebussola\common\datatype\String('  SHINAGAWA ');

        $this->assertEquals('awaganihs', $str->trim()->strtolower()->strrev());
        $this->assertEquals(9, $str->trim()->strlen());
    }

}