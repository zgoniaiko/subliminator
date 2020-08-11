<?php

namespace App\Transformer;

use App\Entity\Order;

class AmazonTransformer implements TransformerInterface
{
    public function fromArray(array $data) : Order
    {
        $data['name'] = isset($data['name']) ? $data['name'] : '';
        $data['email'] = isset($data['email']) ? $data['email'] : '';
        $data['shipping_address'] = isset($data['shipping_address']) ? $data['shipping_address'] : '';
        $data['amount'] = isset($data['amount']) ? $data['amount'] : 0;

        $order = new Order();

        $order->setName($data['name']);
        $order->setEmail($data['email']);
        $order->setShippingAddress($data['shipping_address']);
        $order->setAmount($data['amount']);

        return $order;
    }

    public function supports($platform): bool
    {
        return 'amazon' === strtolower($platform);
    }
}
