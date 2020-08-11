<?php

namespace App\Tests\Service;

use App\Entity\Order;
use App\Service\AmazonImportService;
use PHPUnit\Framework\TestCase;

class AmazonImportServiceTest extends TestCase
{
    protected $service;

    protected function setUp()
    {
        $this->service = new AmazonImportService();
    }

    public function testParseEmptyData()
    {
        $order = $this->service->parse([]);

        $this->assertInstanceOf(Order::class, $order);

        $this->assertNull($order->getId());
        $this->assertEquals('', $order->getName());
        $this->assertEquals('', $order->getEmail());
        $this->assertEquals('', $order->getShippingAddress());
        $this->assertEquals(0, $order->getAmount());
    }

    public function testParse()
    {
        $data['name'] = 'Boris';
        $data['email'] = 'boris@example.com';
        $data['shipping_address'] = 'Faroe Islands';
        $data['amount'] = 7846;

        $order = $this->service->parse($data);

        $this->assertInstanceOf(Order::class, $order);

        $this->assertNull($order->getId());
        $this->assertEquals($data['name'], $order->getName());
        $this->assertEquals($data['email'], $order->getEmail());
        $this->assertEquals($data['shipping_address'], $order->getShippingAddress());
        $this->assertEquals($data['amount'], $order->getAmount());
    }
}
