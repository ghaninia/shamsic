<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\Schedule\Validations\Single\StepValue;

class StepValueTest extends TestCase
{
    /**
     * @test
     */
    public function stepValue()
    {
        $result = (new StepValue())->passes("*/2");
        $this->assertTrue($result);

        $result = (new StepValue())->passes("*/2/3");
        $this->assertFalse($result);

        $result = (new StepValue())->passes("*/0");
        $this->assertFalse($result);

        $result = (new StepValue())->passes("0/*");
        $this->assertFalse($result);
    }
}
