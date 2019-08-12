<?php

namespace App;

class ItemHandler
{
    public static function handle(Item $item): void
    {
        static::handleSellIn($item);
        static::handleQuality($item);
        static::ensureQualityRange($item);
    }

    protected static function ensureQualityRange(Item $item): void
    {
        if ($item->quality < 0) {
            // The Quality of an item is never negative
            $item->quality = 0;
        } elseif ($item->quality > 50) {
            // The Quality of an item is never more than 50
            $item->quality = 50;
        }
    }

    protected static function handleQuality(Item $item): void
    {
        // At the end of each day our system lowers both values for every item
        --$item->quality;
        if ($item->sell_in < 0) {
            // Once the sell by date has passed, Quality degrades twice as fast
            --$item->quality;
        }
    }

    protected static function handleSellIn(Item $item): void
    {
        // At the end of each day our system lowers both values for every item
        --$item->sell_in;
    }
}