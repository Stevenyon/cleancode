<?php

namespace Aston;

use Aston\Hello;
use PHPUnit\Framework\TestCase;

class HelloTest extends TestCase{
    public function testHello(){
        $this->assertEquals('Hello, Cleancode', new Hello());
    }
}