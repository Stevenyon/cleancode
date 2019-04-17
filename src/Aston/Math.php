<?php

namespace Aston;

use InvalidArgumentException;

class Math
{
    public static function divide(float $nb1, float $nb2): float
    {
        if ($nb2 == 0.0) {
            throw new InvalidArgumentException('Error div by 0');
        }
        return $nb1 / $nb2;
    }
}
