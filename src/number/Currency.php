<?php

namespace ebussola\common\datatype\number;

use ebussola\common\datatype\Number;

/**
 * Author: Leonardo Branco Shinagawa
 * Date: 05/12/11
 * Time: 11:20
 */
class Currency extends Number {

    /**
     * @var string
     */
    private static $globalFormat;

    /**
     * @var string
     */
    protected $format;

    /**
     * @var string
     */
    protected $locale;

    public function __construct($value = 0, $locale=null) {
        parent::__construct($value);
        $this->locale = $locale;
    }

    public function __toString() {
        $result = $this->format();
        if ($this->isNegative() && substr($result, 0, 1) !== '(') {
            $result = '(' . str_replace('-', '', $result) . ')';
        }

        return $result;
    }

    /**
     * @param Number|string $value
     * @return Currency
     */
    public function setValue($value) {
        parent::setValue($value);

        if (preg_match('/^\(.*\)$/is', trim($value))) {
            $this->setIsNegative(true);
            $this->setRawValue('-' . $this->getValue());
        }

        return $this;
    }

    /**
     * @param string $format
     * {symbol} the currency symbol
     * {number} the value formatted
     */
    public function setFormat($format) {
        $this->format = $format;
    }

    /**
     * @param string $globalFormat
     * @see setFormat
     */
    public static function setGlobalFormat($globalFormat) {
        self::$globalFormat = $globalFormat;
    }

    private function format() {
        $locale = $this->locale === null ? \Locale::getDefault() : $this->locale;
        $numberFormatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
        $result = $numberFormatter->format($this->getValue());

        if ($this->format !== null || self::$globalFormat !== null) {
            // need a special format?

            if ($this->format === null) {
                // if the local format was not setted, the global format is used
                $this->format = self::$globalFormat;
            }

            // remove the parenthesis indicating negative value, it will be placed afterwards
            $result = trim($result, '()');

            $symbol = $numberFormatter->getSymbol(\NumberFormatter::CURRENCY_SYMBOL);
            $number = trim(str_replace($symbol, '', $result));

            $result = str_replace('{symbol}', $symbol, $this->format);
            $result = str_replace('{number}', $number, $result);
        }

        return $result;
    }

}