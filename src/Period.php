<?php

namespace ebussola\common\datatype;

/**
 * Author: Leonardo Branco Shinagawa
 * Date: 02/04/12
 * Time: 16:00
 */
class Period implements \Iterator, \Countable
{

    /**
     * @var \DateTime
     */
    protected $start;

    /**
     * @var \DateTime
     */
    protected $end;

    /**
     * @var \DateInterval
     */
    protected $interval;

    /**
     * @var \DateTime
     */
    private $current;

    /**
     * @param \DateTime $start
     * @param \DateInterval | int $interval
     * @param \DateTime | int $end
     */
    public function __construct(\DateTime $start, $interval, $end) {
        if (!$interval instanceof \DateInterval) {
            $interval = new \DateInterval("P{$interval}D");
        }

        if (!$end instanceof \DateTime) {
            $recurrences = $end;
            $end = clone $start;
            for ($i=0 ; $i<$recurrences ; $i++) {
                $end = $end->add($interval);
            }
        }

        $this->start = $start;
        $this->end = $end;
        $this->interval = $interval;
        $this->rewind();
    }

    /**
     * @return \DateTime
     */
    public function start() {
        return $this->start;
    }

    /**
     * @return \DateTime
     */
    public function end() {
        return $this->end;
    }

    /**
     * @return \DateInterval
     */
    public function interval() {
        return $this->interval;
    }

    /**
     * @return integer
     */
    public function count() {
        $i = 0;
        foreach ($this as $date) {
            $i++;
        }

        return $i;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current()
    {
        return $this->current;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        $this->current->add($this->interval);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        return (string) $this->current;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        return $this->current <= $this->end;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        $this->current = clone $this->start;
    }
}