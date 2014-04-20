<?php

namespace ebussola\common\datatype;

/**
 * Author: Leonardo Branco Shinagawa
 * Date: 12/12/11
 * Time: 18:27
 */
class Date extends DateTime
{

    /**
     * @var string
     */
    protected $format;

    public function __construct ($time='now', \DateTimeZone $timezone=null, $locale=null) {
        parent::__construct($time, $timezone, $locale);
        $this->setTime(0, 0, 0);
    }

    public function __toString() {
        return $this->format($this->format);
    }

    protected function setupDefaultFormat($locale=null) {
        parent::setupDefaultFormat($locale);
        $this->format = $this->getLanguage()['date_format'];
    }

}
