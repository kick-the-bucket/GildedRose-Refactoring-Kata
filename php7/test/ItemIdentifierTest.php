<?php

namespace App;

use PHPUnit\Framework\TestCase;

class ItemIdentifierTest extends TestCase
{
    public function testAgedBrie(): void
    {
        $item = new Item('Aged Brie', 0, 0);
        $itemIdentifier = new ItemIdentifier($item);
        $this->assertTrue($itemIdentifier->isAgedBrie());
        $this->assertFalse($itemIdentifier->isBackstagePass());
        $this->assertFalse($itemIdentifier->isConjured());
        $this->assertFalse($itemIdentifier->isSulfuras());
    }

    public function testBackstagePass(): void
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 0, 0);
        $itemIdentifier = new ItemIdentifier($item);
        $this->assertFalse($itemIdentifier->isAgedBrie());
        $this->assertTrue($itemIdentifier->isBackstagePass());
        $this->assertFalse($itemIdentifier->isConjured());
        $this->assertFalse($itemIdentifier->isSulfuras());
    }

    public function testConjured(): void
    {
        $item = new Item('Conjured foo', 0, 0);
        $itemIdentifier = new ItemIdentifier($item);
        $this->assertFalse($itemIdentifier->isAgedBrie());
        $this->assertFalse($itemIdentifier->isBackstagePass());
        $this->assertTrue($itemIdentifier->isConjured());
        $this->assertFalse($itemIdentifier->isSulfuras());
    }

    public function testGeneral(): void
    {
        $item = new Item('foo', 0, 0);
        $itemIdentifier = new ItemIdentifier($item);
        $this->assertFalse($itemIdentifier->isAgedBrie());
        $this->assertFalse($itemIdentifier->isBackstagePass());
        $this->assertFalse($itemIdentifier->isConjured());
        $this->assertFalse($itemIdentifier->isSulfuras());
    }

    public function testSulfuras(): void
    {
        $item = new Item('Sulfuras, Hand of Ragnaros', 0, 0);
        $itemIdentifier = new ItemIdentifier($item);
        $this->assertFalse($itemIdentifier->isAgedBrie());
        $this->assertFalse($itemIdentifier->isBackstagePass());
        $this->assertFalse($itemIdentifier->isConjured());
        $this->assertTrue($itemIdentifier->isSulfuras());
    }
}
