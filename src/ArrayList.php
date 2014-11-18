<?php

namespace ebussola\common\datatype;

use Doctrine\Common\Inflector\Inflector;

/**
 * Thanks to Miguel Elias Santos <migueleliasweb at gmail dot com>
 *
 * Alternative implementation of PHP's native
 * It magically (__call) routes all 'array_' native function correnctly
 *
 * @method ArrayList changeKeyCase    Changes all keys in an array
 * @method ArrayList chunk              Split an array into chunks
 * @method ArrayList combine            Creates an array by using one array for keys and another for its values
 * @method ArrayList countValues       Counts all the values of an array
 * @method ArrayList diffAssoc         Computes the difference of arrays with additional index check
 * @method ArrayList diffKey           Computes the difference of arrays using keys for comparison
 * @method ArrayList diffUassoc        Computes the difference of arrays with additional index check which is performed by a user supplied callback function
 * @method ArrayList diffUkey          Computes the difference of arrays using a callback function on the keys for comparison
 * @method ArrayList diff               Computes the difference of arrays
 * @method ArrayList fillKeys          Fill an array with values, specifying keys
 * @method ArrayList fill               Fill an array with values
 * @method ArrayList filter             Filters elements of an array using a callback function
 * @method ArrayList flip               Exchanges all keys with their associated values in an array
 * @method ArrayList intersectAssoc    Computes the intersection of arrays with additional index check
 * @method ArrayList intersectKey      Computes the intersection of arrays using keys for comparison
 * @method ArrayList intersectUassoc   Computes the intersection of arrays with additional index check, compares indexes by a callback function
 * @method ArrayList intersectUkey     Computes the intersection of arrays using a callback function on the keys for comparison
 * @method ArrayList intersect          Computes the intersection of arrays
 * @method ArrayList keyExists         Checks if the given key or index exists in the array
 * @method ArrayList keys               Return all the keys or a subset of the keys of an array
 * @method ArrayList map                Applies the callback to the elements of the given arrays
 * @method ArrayList mergeRecursive    Merge two or more arrays recursively
 * @method ArrayList merge              Merge one or more arrays
 * @method ArrayList multisort          Sort multiple or multi-dimensional arrays
 * @method ArrayList pad                Pad array to the specified length with a value
 * @method ArrayList pop                Pop the element off the end of array
 * @method ArrayList product            Calculate the product of values in an array
 * @method ArrayList push               Push one or more elements onto the end of array
 * @method ArrayList rand               Pick one or more random entries out of an array
 * @method ArrayList reduce             Iteratively reduce the array to a single value using a callback function
 * @method ArrayList replaceRecursive  Replaces elements from passed arrays into the first array recursively
 * @method ArrayList replace            Replaces elements from passed arrays into the first array
 * @method ArrayList reverse            Return an array with elements in reverse order
 * @method ArrayList search             Searches the array for a given value and returns the corresponding key if successful
 * @method ArrayList shift              Shift an element off the beginning of array
 * @method ArrayList slice              Extract a slice of the array
 * @method ArrayList splice             Remove a portion of the array and replace it with something else
 * @method ArrayList sum                Calculate the sum of values in an array
 * @method ArrayList udiffAssoc        Computes the difference of arrays with additional index check, compares data by a callback function
 * @method ArrayList udiffUassoc       Computes the difference of arrays with additional index check, compares data and indexes by a callback function
 * @method ArrayList udiff              Computes the difference of arrays by using a callback function for data comparison
 * @method ArrayList uintersectAssoc   Computes the intersection of arrays with additional index check, compares data by a callback function
 * @method ArrayList uintersectUassoc  Computes the intersection of arrays with additional index check, compares data and indexes by a callback functions
 * @method ArrayList uintersect         Computes the intersection of arrays, compares data by a callback function
 * @method ArrayList unique             Removes duplicate values from an array
 * @method ArrayList unshift            Prepend one or more elements to the beginning of an array
 * @method ArrayList values             Return all the values of an array
 * @method ArrayList walkRecursive     Apply a user function recursively to every member of an array
 */
class ArrayList extends \ArrayObject
{

    public function __call($func, $argv)
    {
        $func = 'array_' . Inflector::tableize($func);
        if (!is_callable($func)) {
            throw new \BadMethodCallException(__CLASS__ . '->' . $func);
        }

        // some functions don't follow the others array functions argument pattern ¬¬
        if (in_array($func, array('array_map', 'array_search'))) {
            $args = array_merge($argv, array($this->getArrayCopy()));
        } else {
            $args = array_merge(array($this->getArrayCopy()), $argv);
        }
        $result = call_user_func_array($func, $args);

        if (is_array($result)) {
            // some array functions dont return an array
            // eg.: array_reduce
            $result = new self($result);
        }

        return $result;
    }

    /**
     * Apply a user function to every member of an array
     *
     * @param Callable $callback
     * @return bool
     */
    public function walk(Callable $callback)
    {
        $arrayCopy = $this->getArrayCopy();
        $result = array_walk($arrayCopy, $callback);
        $this->exchangeArray($arrayCopy);
        return $result;
    }

}
