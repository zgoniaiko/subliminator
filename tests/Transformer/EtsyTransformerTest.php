<?php

namespace App\Tests\Transformer;

use App\Entity\Order;
use App\Transformer\EtsyTransformer;
use PHPUnit\Framework\TestCase;

class EtsyTransformerTest extends TestCase
{
    protected $transformer;

    protected function setUp()
    {
        $this->transformer = new EtsyTransformer();
    }

    public function testFromArrayEmptyData()
    {
        $order = $this->transformer->fromArray([]);

        $this->assertInstanceOf(Order::class, $order);

        $this->assertNull($order->getId());
        $this->assertEquals('', $order->getName());
        $this->assertEquals('', $order->getEmail());
        $this->assertEquals('', $order->getShippingAddress());
        $this->assertEquals(0, $order->getAmount());
    }

    public function testFromArray()
    {
        $data['first_name'] = 'John';
        $data['last_name'] = 'Doe';
        $data['email'] = 'john@example.com';
        $data['address'] = 'French Southern Territories';
        $data['amount'] = 9;

        $order = $this->transformer->fromArray($data);

        $this->assertInstanceOf(Order::class, $order);

        $this->assertNull($order->getId());
        $this->assertEquals($data['first_name'] . ' ' . $data['last_name'], $order->getName());
        $this->assertEquals($data['email'], $order->getEmail());
        $this->assertEquals($data['address'], $order->getShippingAddress());
        $this->assertEquals($data['amount'], $order->getAmount());
    }

}
