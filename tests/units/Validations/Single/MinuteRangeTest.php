<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\Schedule\Validations\Single\MinuteRange;

class MinuteRangeTest extends TestCase
{
    /**
     * @test
     */
    public function hourRange()
    {
        $minuteRange = new MinuteRange;

        $this->assertTrue($minuteRange->passes(0));
        $this->assertTrue($minuteRange->passes(23));
        $this->assertFalse($minuteRange->passes(60));
    }
}
