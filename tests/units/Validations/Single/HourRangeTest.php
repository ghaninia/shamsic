<?php

use GhaniniaIR\Shamsic\Validations\Single\HourRange;
use PHPUnit\Framework\TestCase;

class HourRangeTest extends TestCase
{
    /**
     * @test
     */
    public function hourRange()
    {
        $hourRange = new HourRange;

        $this->assertTrue($hourRange->passes(0));
        $this->assertTrue($hourRange->passes(23));
        $this->assertFalse($hourRange->passes(24));
    }
}
