<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 24/03/17
 * Time: 11:31
 */

namespace Eukles\Util;

class DataIteratorTest extends \PHPUnit_Framework_TestCase
{
    
    public function testCanAddAndReadData()
    {
        $d        = new DataIterator();
        $d["key"] = "value";
        $this->assertTrue($d["key"] === "value");
    }
    
    public function testIsArrayAccess()
    {
        $d = new DataIterator();
        $this->assertTrue($d instanceof \ArrayAccess);
    }
    
    public function testIsIterator()
    {
        $d = new DataIterator();
        $this->assertTrue($d instanceof \Iterator);
    }
    
    public function testIterate()
    {
        $d         = new DataIterator();
        $d["key"]  = "value";
        $d["key2"] = "value2";
        $dArray    = [];
        foreach ($d as $key => $item) {
            $dArray[$key] = $item;
        }
        $this->assertEquals(["key" => "value", "key2" => "value2"], $dArray);
    }
    
    public function testOffset()
    {
        $d = new DataIterator();
        $d->offsetSet("key", "value");
        $this->assertTrue($d->offsetExists("key"));
        $this->assertEquals("value", $d->offsetGet("key"));
        $d->offsetUnset("key");
        $this->assertFalse($d->offsetExists("key"));
    }
}
