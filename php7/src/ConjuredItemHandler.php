<?php

namespace App;

class ConjuredItemHandler extends ItemHandler
{
    protected static function handleQuality(Item $item): void
    {
        parent::handleQuality($item);
        parent::handleQuality($item);
    }
}