<?php

namespace Cart\Store;

use SplObjectStorage;

class ResultSet implements ResultSetInterface
{
    /**
     * @var SplObjectStorage
     */
    private $storage;

    /**
     * ResultSet constructor.
     * @param SplObjectStorage $storage
     */
    public function __construct(SplObjectStorage $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return $this->storage->count();
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return $this->storage;
    }
}
