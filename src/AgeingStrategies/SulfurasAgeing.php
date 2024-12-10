<?php

declare(strict_types=1);

namespace App\AgeingStrategies;

use App\Item;

class SulfurasAgeing implements ItemAgeingInterface
{
    public function update(Item $item): void {
        $item->quality = 80;
    }
}