<?php

namespace App;

final class GildedRose
{
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $identifier = new ItemIdentifier($item);
            switch (true) {
                case $identifier->isAgedBrie():
                    AgedBrieHandler::handle($item);
                    break;
                case $identifier->isBackstagePass():
                    BackstagePassHandler::handle($item);
                    break;
                case $identifier->isConjured():
                    ConjuredItemHandler::handle($item);
                    break;
                case $identifier->isSulfuras():
                    SulfurasHandler::handle($item);
                    break;
                default:
                    ItemHandler::handle($item);
            }
        }
    }
}

