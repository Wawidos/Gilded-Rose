<?php

declare(strict_types=1);

namespace App\AgeingStrategies;

use App\Item;

interface ItemAgeingInterface
{
    public function update(Item $item): void;
}