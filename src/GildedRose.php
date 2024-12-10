<?php

namespace App;

use App\AgeingStrategies\AgedBrieAgeing;
use App\AgeingStrategies\BackstagePassAgeing;
use App\AgeingStrategies\DefaultItemAgeing;
use App\AgeingStrategies\ItemAgeingInterface;
use App\AgeingStrategies\SulfurasAgeing;

final class GildedRose
{
    public function updateQuality(Item $item): void
    {
        $updater = $this->getUpdaterFor($item);
        $updater->update($item);
    }

    private function getUpdaterFor(Item $item): ItemAgeingInterface {
        return match($item->name) {
            'Aged Brie' => new AgedBrieAgeing(),
            'Backstage passes to a TAFKAL80ETC concert' => new BackstagePassAgeing(),
            'Sulfuras, Hand of Ragnaros' => new SulfurasAgeing(),
            default => new DefaultItemAgeing(),
        };
    }
}