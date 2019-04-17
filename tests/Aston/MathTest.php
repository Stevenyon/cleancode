<?php

namespace Aston;

use Aston\Math;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;
use TypeError;

class MathTest extends TestCase
{
    public function testDivide()
    {
        $this->assertEquals('1', Math::divide(2, 2));
        $this->assertEquals('10', Math::divide(10, 1));
    }

    public function testDivideWithZero()
    {
        $this->expectException(InvalidArgumentException::class);
        Math::divide(2, 0);

        $this->assertEquals('0', Math::divide(0, 2));
    }

    public function testDivideWithUnauthorizedValue()
    {
        $this->expectException(TypeError::class);
        Math::divide('2', null);

        $this->expectException(TypeError::class);
        Math::divide('a', 4);

        $this->expectException(TypeError::class);
        Math::divide('4', '.');

    }
}