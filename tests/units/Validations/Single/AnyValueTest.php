<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\Shamsic\Validations\Single\AnyValue;

class AnyValueTest extends TestCase
{
    /**
     * @test
     */
    public function anyValue()
    {
        $result = (new AnyValue())->passes("*");
        $this->assertTrue($result);
        $result = (new AnyValue())->passes("-");
        $this->assertFalse($result);
    }
}
