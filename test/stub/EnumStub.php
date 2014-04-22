<?php
/**
 * Created by PhpStorm.
 * User: Leonardo Shinagawa
 * Date: 21/04/14
 * Time: 12:24
 */

use ebussola\common\datatype\Enum;

class EnumStub extends Enum {

    /**
     * @return array
     * Return a list of available options.
     */
    public function defaults()
    {
        return [2=>'STRING', 3=>'INTEGER', 5=>'FLOAT', 0=>'BOOLEAN'];
    }

    /**
     * Generally return __CLASS__ is the best fit ;)
     *
     * @return String
     * Return the name identifying the Enum class
     */
    public function enumId()
    {
        return __CLASS__;
    }

}