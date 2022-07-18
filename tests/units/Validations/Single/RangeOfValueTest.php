<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\Schedule\Validations\Single\RangeOfValue;

class RangeOfValueTest extends TestCase
{
    /**
     * @test
     */
    public function rangeOfValue()
    {
        $result = (new RangeOfValue(0, 59))->passes("10-20");
        $this->assertTrue($result);

        $result = (new RangeOfValue(0, 59))->passes("10-20-30");
        $this->assertFalse($result);

        $result = (new RangeOfValue(0, 59))->passes("10-20-30-40");
        $this->assertFalse($result);

        $result = (new RangeOfValue(11, 59))->passes("10-20");
        $this->assertFalse($result);
    }
}
