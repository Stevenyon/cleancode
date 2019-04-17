<?php

namespace Cart;

use Cart\Store\ResultSetInterface;

interface ProductStoreInterface
{
    /**
     * @param Product $product
     * @return ProductStoreInterface
     */
    public function add(Product $product): ProductStoreInterface;

    /**
     * @param Product $product
     * @return ProductStoreInterface
     */
    public function update(Product $product): ProductStoreInterface;

    /**
     * @param Product $product
     * @return ProductStoreInterface
     */
    public function remove(Product $product): ProductStoreInterface;

    /**
     * @param $id
     * @return Product|null
     */
    public function find($id): ?Product;

    /**
     * @return ResultSetInterface
     */
    public function findAll(): ResultSetInterface;
}
