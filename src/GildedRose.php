<?php

namespace App;

final class GildedRose
{
    public function updateQuality($item)
    {
        if ($item->name === 'Sulfuras, Hand of Ragnaros') {
            $item->quality = 80;

            return;
        }

        if ($item->name === 'Aged Brie') {
            $item->sell_in--;

            if ($item->quality < 50) {
                $item->quality++;
            }

            if ($item->sell_in < 0 && $item->quality < 50) {
                $item->quality++;
            }

            return;
        }

        if ($item->name === 'Backstage passes to a TAFKAL80ETC concert') {
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

            return;
        }

        $item->sell_in--;

        if ($item->quality > 0) {
            $item->quality--;
        }

        if ($item->sell_in < 0 && $item->quality > 0) {
            $item->quality--;
        }
    }
}