<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\SolarCron\Validations\Single\DaysOfMonthRange;

class DaysOfMonthRangeTest extends TestCase
{
    /**
     * @test
     */
    public function daysOfMonthRange()
    {
        $daysOfMonthRange = new DaysOfMonthRange();
        $this->assertTrue($daysOfMonthRange->passes(1));
        $this->assertTrue($daysOfMonthRange->passes(31));
        $this->assertFalse($daysOfMonthRange->passes(0));
        $this->assertFalse($daysOfMonthRange->passes(32));
    }
}
