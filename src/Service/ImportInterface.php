<?php

namespace App\Service;

use App\Entity\Order;

interface ImportInterface
{
    public function parse(array $data) : Order;

    public function supports($platform) : bool;
}
