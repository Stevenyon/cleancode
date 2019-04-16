<?php

namespace Aston;

use InvalidArgumentException;

class Account
{
    /**
     * @var int
     */
    private $number;

    /**
     * @var float
     */
    private $balance;

    /**
     * Account constructor.
     * @param int $number
     * @param float $balance
     */
    public function __construct(int $number, float $balance = 0)
    {
        $this->setNumber($number)
            ->setBalance($balance);
    }

    public function increase(float $balance): void
    {
        if ($balance < 0) {
            throw new InvalidArgumentException('Balance is negative');
        }

        $this->balance += $balance;
    }

    public function decrease(float $balance): void
    {
        if ($balance < 0) {
            throw new InvalidArgumentException('Balance is negative');
        }

        $this->balance -= $balance;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return Account
     */
    public function setNumber(int $number): Account
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return float
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * @param float $balance
     * @return Account
     */
    public function setBalance(float $balance): Account
    {
        $this->balance = $balance;
        return $this;
    }
}
