<?php

namespace App\Service;

use App\Entity\Order;

class EtsyTransformer implements TransformerInterface
{
    public function fromArray(array $data) : Order
    {
        $data['first_name'] = isset($data['first_name']) ? $data['first_name'] : '';
        $data['last_name'] = isset($data['last_name']) ? $data['last_name'] : '';
        $data['email'] = isset($data['email']) ? $data['email'] : '';
        $data['address'] = isset($data['address']) ? $data['address'] : '';
        $data['amount'] = isset($data['amount']) ? $data['amount'] : 0;

        $order = new Order();

        $order->setName(trim($data['first_name'] . ' ' . $data['last_name']));
        $order->setEmail($data['email']);
        $order->setShippingAddress($data['address']);
        $order->setAmount($data['amount']);

        return $order;
    }

    public function supports($platform): bool
    {
        return 'etsy' === strtolower($platform);
    }
}
