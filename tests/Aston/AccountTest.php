<?php

namespace Aston;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
    public function testConstructorBalanceZero()
    {
        $account = new Account(1234);

        $this->AssertEquals(1234, $account->getNumber());
        $this->AssertEquals(0, $account->getBalance());
    }

    public function testIncreaseBalanceWithNegativeValue()
    {
        $this->expectException(InvalidArgumentException::class);

        $account = new Account(1234, 200);
        $account->increase(-100);
    }

    public function testIncreaseBalance()
    {
        $account = new Account(5238, 600);
        $account->increase(50);
        $this->AssertEquals(650, $account->getBalance());
    }

    public function testDecreaseBalanceWithNegativeValue()
    {
        $this->expectException(InvalidArgumentException::class);

        $account = new Account(1234, 200);
        $account->decrease(-100);
    }

    public function testDecreaseBalance()
    {
        $account = new Account(4589, 265);
        $account->decrease(50);
        $this->AssertEquals(215, $account->getBalance());
    }

}