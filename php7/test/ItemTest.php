<?php

namespace App;

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testToString(): void
    {
        $name = 'name';
        $sellIn = 1;
        $quality = 50;
        $item = new Item($name, $sellIn, $quality);
        $this->assertSame(sprintf('%s, %s, %s', $name, $sellIn, $quality), (string) $item);
    }
}
