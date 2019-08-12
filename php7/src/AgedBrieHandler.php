<?php

namespace App;

class AgedBrieHandler extends ItemHandler
{
    protected static function handleQuality(Item $item): void
    {
        if ($item->quality < 50) {
            // "Aged Brie" actually increases in Quality the older it gets
            ++$item->quality;
        }
    }
}