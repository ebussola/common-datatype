<?php
/**
 * Created by PhpStorm.
 * User: shina
 * Date: 20/04/14
 * Time: 13:20
 */

class OrderedListTest extends PHPUnit_Framework_TestCase {

    public function testGeneralUse() {
        $date_ordered = new \ebussola\common\datatype\datetime\OrderedList();

        $date_ordered->add(new \ebussola\common\datatype\Date('1986-08-19'), 'Birthday');
        $date_ordered['1986-08-20'] = 'Post Birthday';
        $date_ordered->add(new \ebussola\common\datatype\Date('1986-08-15'), 'Pre Birthday');

        $i = 1;
        foreach ($date_ordered as $val) {
            switch ($i) {
                case 1: $this->assertEquals('Pre Birthday', $val); break;
                case 2: $this->assertEquals('Birthday', $val); break;
                case 3: $this->assertEquals('Post Birthday', $val);
            }
            $i++;
        }

        $this->assertCount(3, $date_ordered);
    }

}