<?php

/**
 * Created by PhpStorm.
 * User: Leonardo Shinagawa
 * Date: 21/04/14
 * Time: 11:36
 */
class ArrayListTest extends PHPUnit_Framework_TestCase
{

    public function testChangeKeyCase()
    {
        $arr = new \ebussola\common\datatype\ArrayList();
        $arr['Leo'] = 1;
        $arr['LeoNardo'] = 1;
        $arr['Shina'] = 1;

        $arr = $arr->changeKeyCase(CASE_LOWER);

        $a = 1;
        foreach ($arr as $i => $val) {
            switch ($a) {
                case 1 :
                    $this->assertEquals('leo', $i);
                    break;
                case 2 :
                    $this->assertEquals('leonardo', $i);
                    break;
                case 3 :
                    $this->assertEquals('shina', $i);
                    break;
            }

            $a++;
        }

    }

    public function testChunk()
    {
        $arr = new \ebussola\common\datatype\ArrayList();
        $arr[] = 1;
        $arr[] = 2;
        $arr[] = 3;
        $arr[] = 4;
        $arr[] = 5;
        $arr[] = 6;

        $arr = $arr->chunk(2);

        foreach ($arr as $_arr) {
            $this->assertCount(2, $_arr);
        }
    }

    public function testMap()
    {
        $arr = new \ebussola\common\datatype\ArrayList([1, 2, 3, 4, 5, 6]);

        $arr = $arr->map(function ($item) {
            return $item + 1;
        });

        foreach ($arr as $i => $val) {
            switch ($i) {
                case 0 :
                    $this->assertEquals(2, $val);
                    break;
                case 1 :
                    $this->assertEquals(3, $val);
                    break;
                case 2 :
                    $this->assertEquals(4, $val);
                    break;
                case 3 :
                    $this->assertEquals(5, $val);
                    break;
                case 4 :
                    $this->assertEquals(6, $val);
                    break;
                case 5 :
                    $this->assertEquals(7, $val);
                    break;
            }
        }
    }

    public function testSearch()
    {
        $arr = new \ebussola\common\datatype\ArrayList([1, 2, 3, 4, 5]);
        $index = $arr->search(3);

        $this->assertEquals($index, 2);
    }

}