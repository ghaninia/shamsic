<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\Schedule\Validations\Single\Seprator;

class SepratorTest extends TestCase
{
    /**
     * @test
     */
    public function seprator()
    {
        $seprator = (new Seprator(1, 3))->passes('1,2,3');
        $this->assertTrue($seprator);
        
        $seprator = (new Seprator(1, 4))->passes('1,2,3,4');
        $this->assertTrue($seprator);
        
        $seprator = (new Seprator(1, 4))->passes('1,2,3,4,5');
        $this->assertFalse($seprator);
        
        $seprator = (new Seprator(1, 4))->passes('1,problem,3,test,5');
        $this->assertFalse($seprator);
    }
}
