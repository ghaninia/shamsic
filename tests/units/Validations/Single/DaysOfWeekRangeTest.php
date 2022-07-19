<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\Shamsic\Validations\Single\DayOfWeekRange;

class DayOfWeekRangeTest extends TestCase
{
    /**
     * @test
     */
    public function DayOfWeekRange()
    {
        $DayOfMonthRange = new DayOfWeekRange();
        $this->assertTrue($DayOfMonthRange->passes(1));
        $this->assertTrue($DayOfMonthRange->passes(7));
        $this->assertFalse($DayOfMonthRange->passes(0));
        $this->assertFalse($DayOfMonthRange->passes(8));
    }
}
