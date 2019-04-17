<?php

namespace Cart\Store;

use Cart\Product;
use Cart\ProductStoreInterface;
use SplObjectStorage;

class Mock implements ProductStoreInterface
{
    /**
     * @var SplObjectStorage
     */
    private $products;

    /**
     * Mock constructor.
     */
    public function __construct()
    {
        $this->products = new SplObjectStorage();
    }

    /**
     * @inheritDoc
     */
    public function add(Product $product): ProductStoreInterface
    {
        $this->products->attach($product);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function update(Product $product): ProductStoreInterface
    {
        $this->products->attach($product);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function remove(Product $product): ProductStoreInterface
    {
        $this->products->detach($product);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function find($id): ?Product
    {
        foreach ($this->findAll() as $p) {
            if ($p->getId() === $id) {
                return $p;
            }
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    public function findAll(): ResultSetInterface
    {
        return new ResultSet($this->products);
    }
}
