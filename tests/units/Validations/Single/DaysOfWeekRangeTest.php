<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\SolarCron\Validations\Single\DaysOfWeekRange;

class DaysOfWeekRangeTest extends TestCase
{
    /**
     * @test
     */
    public function daysOfWeekRange()
    {
        $daysOfMonthRange = new DaysOfWeekRange();
        $this->assertTrue($daysOfMonthRange->passes(1));
        $this->assertTrue($daysOfMonthRange->passes(7));
        $this->assertFalse($daysOfMonthRange->passes(0));
        $this->assertFalse($daysOfMonthRange->passes(8));
    }
}
