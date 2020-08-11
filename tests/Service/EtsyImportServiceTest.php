<?php

namespace App\Tests\Service;

use App\Entity\Order;
use App\Service\EtsyImportService;
use PHPUnit\Framework\TestCase;

class EtsyImportServiceTest extends TestCase
{
    protected $service;

    protected function setUp()
    {
        $this->service = new EtsyImportService();
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
        $data['first_name'] = 'John';
        $data['last_name'] = 'Doe';
        $data['email'] = 'john@example.com';
        $data['address'] = 'French Southern Territories';
        $data['amount'] = 9;

        $order = $this->service->parse($data);

        $this->assertInstanceOf(Order::class, $order);

        $this->assertNull($order->getId());
        $this->assertEquals($data['first_name'] . ' ' . $data['last_name'], $order->getName());
        $this->assertEquals($data['email'], $order->getEmail());
        $this->assertEquals($data['address'], $order->getShippingAddress());
        $this->assertEquals($data['amount'], $order->getAmount());
    }

}
