<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\Shamsic\Validations\Single\DayOfMonthRange;

class DayOfMonthRangeTest extends TestCase
{
    /**
     * @test
     */
    public function DayOfMonthRange()
    {
        $DayOfMonthRange = new DayOfMonthRange();
        $this->assertTrue($DayOfMonthRange->passes(1));
        $this->assertTrue($DayOfMonthRange->passes(31));
        $this->assertFalse($DayOfMonthRange->passes(0));
        $this->assertFalse($DayOfMonthRange->passes(32));
    }
}
