<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\Shamsic\Validations\Single\MonthRange;

class MonthRangeTest extends TestCase
{
    /**
     * @test
     */
    public function monthRange()
    {
        $monthRange = new MonthRange;

        $this->assertTrue($monthRange->passes(1));
        $this->assertTrue($monthRange->passes(12));
        $this->assertFalse($monthRange->passes(13));

    }
}
