<?php

/**
 * Created by PhpStorm.
 * User: Leonardo Shinagawa
 * Date: 22/04/14
 * Time: 09:02
 */
class UrlTest extends PHPUnit_Framework_TestCase
{

    public function testGeneralUse()
    {
        $url = new \ebussola\common\datatype\Url('http://www.ebussola.com/page/1?name=url_class#frag');

        $this->assertEquals('http', $url->scheme);
        $this->assertEquals('www.ebussola.com', $url->host);
        $this->assertEquals('/page/1', $url->path);
        $this->assertEquals('name=url_class', $url->query_string);
        $this->assertCount(1, $url->query);
        $this->assertEquals('frag', $url->fragment);

        $url->setAddress('http://shina:qwerasdf@www.ebussola.com:8080/page/1?name=url_class#frag');

        $this->assertEquals('shina', $url->user);
        $this->assertEquals('qwerasdf', $url->pass);
        $this->assertEquals('8080', $url->port);
    }

    public function testChangeQuery()
    {
        $url = new \ebussola\common\datatype\Url('http://www.ebussola.com/page/1?name=url_class#frag');
        $url->query['test'] = 'ok';

        $this->assertContains('test=ok', $url->full_address);
    }

}