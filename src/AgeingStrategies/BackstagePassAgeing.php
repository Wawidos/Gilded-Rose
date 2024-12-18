<?php

declare(strict_types=1);

namespace App\AgeingStrategies;

use App\Item;

class BackstagePassAgeing implements ItemAgeingInterface
{
    public function update(Item $item): void {
        $item->sell_in--;

        if ($item->sell_in < 0) {
            $item->quality = 0;

            return;
        }

        if ($item->quality < 50) {
            $item->quality++;
            if ($item->sell_in < 10 && $item->quality < 50) {
                $item->quality++;
            }
            if ($item->sell_in < 5 && $item->quality < 50) {
                $item->quality++;
            }
        }
    }
}