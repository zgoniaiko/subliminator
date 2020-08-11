<?php

namespace App\Service;

use App\Entity\Order;

interface TransformerInterface
{
    public function fromArray(array $data) : Order;

    public function supports($platform) : bool;
}
