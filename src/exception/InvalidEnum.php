<?php

namespace ebussola\common\datatype\exception;

/**
 * User: Leonardo Shinagawa
 * Date: 14/08/12
 * Time: 13:58
 */
class InvalidEnum extends \Exception
{

    public $chosen;

    public $available_options;

}
