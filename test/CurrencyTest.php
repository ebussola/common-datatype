<?php
use ebussola\common\datatype\number\Currency;

/**
 * Created by PhpStorm.
 * User: shina
 * Date: 21/04/14
 * Time: 21:51
 */

class CurrencyTest extends PHPUnit_Framework_TestCase {

    public function testGeneralUse() {
        $amount = new Currency(50, 'pt_BR');
        $this->assertEquals('R$50,00', (string)$amount);

        $amount = new Currency(50, 'en_US');
        $this->assertEquals('$50.00', (string)$amount);

        locale_set_default('pt_BR');

        $amount = new Currency(-50);
        $this->assertEquals('(R$50,00)', (string)$amount);

        $amount = new Currency('(40,00)');
        $this->assertEquals('(R$40,00)', (string)$amount);

        $amount->setFormat('{number} = {symbol}');
        $this->assertEquals('(40,00 = R$)', (string)$amount);
    }

}