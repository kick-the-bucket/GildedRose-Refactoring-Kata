<?php

namespace App;

class BackstagePassHandler extends ItemHandler
{
    protected static function handleQuality(Item $item): void
    {
        if ($item->sell_in < 0) {
            // Quality drops to 0 after the concert
            $item->quality = 0;

            return;
        }
        switch (true) {
            case $item->sell_in < 6:
                // Quality increases <...> by 3 when there are 5 days or less
                ++$item->quality;
                // no break intentional
            case $item->sell_in < 11:
                // Quality increases by 2 when there are 10 days or less
                ++$item->quality;
                // no break intentional
            default:
                // "Backstage passes", like aged brie, increases in Quality as its SellIn value approaches;
                ++$item->quality;
        }
    }

}