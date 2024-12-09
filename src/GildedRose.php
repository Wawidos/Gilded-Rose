<?php

namespace App;

final class GildedRose
{
    public function updateQuality(Item $item): void
    {
        if ($item->name === 'Sulfuras, Hand of Ragnaros') {
            $item->quality = 80;

            return;
        }

        if ($item->name === 'Aged Brie') {
            $this->updateAgedBrie($item);

            return;
        }

        if ($item->name === 'Backstage passes to a TAFKAL80ETC concert') {
            $this->updateBackstagePass($item);

            return;
        }

        $this->updateRegularItem($item);
    }

    private function updateAgedBrie(Item $item): void
    {
        $this->decrementSellIn($item);

        if ($item->quality < 50) {
            $item->quality++;
        }

        if ($item->sell_in < 0 && $item->quality < 50) {
            $item->quality++;
        }
    }

    private function updateBackstagePass(Item $item): void
    {
        $this->decrementSellIn($item);

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

    private function updateRegularItem(Item $item): void
    {
        $this->decrementSellIn($item);

        if ($item->quality > 0) {
            $item->quality--;
        }

        if ($item->sell_in < 0 && $item->quality > 0) {
            $item->quality--;
        }
    }

    private function decrementSellIn(Item $item): void
    {
        $item->sell_in--;
    }
}