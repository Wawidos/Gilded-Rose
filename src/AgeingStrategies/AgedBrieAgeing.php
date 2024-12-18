<?php

declare(strict_types=1);

namespace App\AgeingStrategies;

use App\Item;

class AgedBrieAgeing implements ItemAgeingInterface
{
    public function update(Item $item): void {
        $item->sell_in--;

        if ($item->quality < 50) {
            $item->quality++;
        }

        if ($item->sell_in < 0 && $item->quality < 50) {
            $item->quality++;
        }
    }
}