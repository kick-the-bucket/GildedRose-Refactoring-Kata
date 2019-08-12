<?php

namespace App;

class ItemIdentifier
{
    private $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function isAgedBrie(): bool
    {
        return $this->item->name === 'Aged Brie';
    }

    public function isBackstagePass(): bool
    {
        return $this->item->name === 'Backstage passes to a TAFKAL80ETC concert';
    }

    public function isSulfuras(): bool
    {
        return $this->item->name === 'Sulfuras, Hand of Ragnaros';
    }
}