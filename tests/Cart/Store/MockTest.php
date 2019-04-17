<?php

namespace Cart\Store;

use Cart\Product;
use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    /**
     * @var ProductStoreInterface
     */
    private $store;

    /**
     * @inheritDoc
     */
    public function setUp(): void
    {
        $this->store = new Mock();
    }

    public function testConstructor()
    {
        $this->assertCount(0, $this->store->findAll());
    }

    public function testAdd()
    {
        $product = new Product(1, "item one", 29.90);
        $this->store->add($product);

        $p = $this->store->find(1);
        $this->assertEquals($product, $p);
    }

    public function testFindNotFoundProduct()
    {
        $this->assertNull($this->store->find(5));
    }

    public function testRemoveProduct()
    {
        $product = new Product(10, 'item', 20.00);
        $this->store->add($product);
        $this->store->remove($product);

        $this->assertNull($this->store->find(10));
    }

    public function testUpdateProduct()
    {
        $product = new Product(65, 'product item', 456);
        $this->store->add($product);
        $p = $this->store->find(65);
        $p->setName('Product Update Test');
        $this->store->update($p);
        $this->assertEquals('Product Update Test', $product->getName());
    }
}