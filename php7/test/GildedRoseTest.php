<?php

namespace App;

use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function dataProvider(): array
    {
        return [
            'Negative quality' => [-1],
            'Zero quality' => [0],
            'Positive quality' => [1],
            'Sell-in < 6' => [5],
            'Sell-in < 11' => [10],
            'Over 50 quality' => [51],
            '80 quality' => [80],
            'Over 80 quality' => [81],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param int $param
     */
    public function testAgedBrie(int $param): void
    {
        $name = 'Aged Brie';
        /** @var Item[] $items */
        $items = [new Item($name, $param, $param)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($name, $items[0]->name, 'Name fail');
        $this->assertEquals($param - 1, $items[0]->sell_in, 'Sell-in fail');
        $this->assertEquals(min(50, $param + 1), $items[0]->quality, 'Quality fail');
    }

    /**
     * @dataProvider dataProvider
     * @param int $param
     */
    public function testBackstagePass(int $param): void
    {
        $name = 'Backstage passes to a TAFKAL80ETC concert';
        /** @var Item[] $items */
        $items = [new Item($name, $param, $param)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($name, $items[0]->name, 'Name fail');
        $this->assertEquals($param - 1, $items[0]->sell_in, 'Sell-in fail');
        $this->assertEquals($param <= 0 ? 0 : min(50, $param + 1 + ($param - 1 < 6 ? 1 : 0) + ($param - 1 < 11 ? 1 : 0)), $items[0]->quality, 'Quality fail');
    }

    /**
     * @dataProvider dataProvider
     * @param int $param
     */
    public function testConjured(int $param): void
    {
        $name = 'Conjured foo';
        /** @var Item[] $items */
        $items = [new Item($name, $param, $param)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($name, $items[0]->name, 'Name fail');
        $this->assertEquals($param - 1, $items[0]->sell_in, 'Sell-in fail');
        $this->assertEquals(min(50, max(0, $param - 2)), $items[0]->quality, 'Quality fail');
    }

    /**
     * @dataProvider dataProvider
     * @param int $param
     */
    public function testGeneral(int $param): void
    {
        $name = 'foo';
        /** @var Item[] $items */
        $items = [new Item($name, $param, $param)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($name, $items[0]->name, 'Name fail');
        $this->assertEquals(--$param, $items[0]->sell_in, 'Sell-in fail');
        $this->assertEquals(min(50, max(0, $param)), $items[0]->quality, 'Quality fail');
    }

    /**
     * @dataProvider dataProvider
     * @param int $param
     */
    public function testSulfuras(int $param): void
    {
        $name = 'Sulfuras, Hand of Ragnaros';
        /** @var Item[] $items */
        $items = [new Item($name, $param, $param)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($name, $items[0]->name, 'Name fail');
        $this->assertEquals($param, $items[0]->sell_in, 'Sell-in fail');
        $this->assertEquals(80, $items[0]->quality, 'Quality fail');
    }
}
