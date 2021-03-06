<?php

namespace App\Transformer;

use App\Entity\Order;

interface TransformerInterface
{
    public function fromArray(array $data) : Order;

    public function supports($platform) : bool;
}
