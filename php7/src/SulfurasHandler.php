<?php

namespace App;

class SulfurasHandler extends ItemHandler
{
    protected static function handleQuality(Item $item): void
    {
        // "Sulfuras" is a legendary item and as such its Quality is 80 and it never alters
        $item->quality = 80;
    }

    protected static function handleSellIn(Item $item): void
    {
        // "Sulfuras", being a legendary item, never has to be sold
    }

    protected static function ensureQualityRange(Item $item): void
    {
        // an item can never have its Quality increase above 50, however "Sulfuras" is a
        // legendary item and as such its Quality is 80
    }
}