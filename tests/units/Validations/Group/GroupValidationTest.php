<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\SolarCron\Validations\Group\GroupValidation;
use GhaniniaIR\SolarCron\Validations\Single\Interfaces\ValidationContract;

class GroupValidationTest extends TestCase
{
    /** @test */
    public function setValidations()
    {
        $mock = $this->createMock(ValidationContract::class);
        $mock->method('passes')->with(1)->willReturn(true);

        $groupValidation = $this->getMockBuilder(GroupValidation::class)
            ->setConstructorArgs([1])
            ->getMock();

        $groupValidation
            ->expects($this->once())
            ->method('setValidations')
            ->willReturnSelf();

        $result = $groupValidation->setValidations($mock);
        $this->assertInstanceOf(GroupValidation::class, $result);
    }

    /** @test */
    public function dispatch()
    {
        $mock = $this->createMock(ValidationContract::class);
        $mock->method('passes')->with(1)->willReturn(true);

        $groupValidation = $this->getMockBuilder(GroupValidation::class)
            ->setConstructorArgs([1])
            ->getMock();

        $groupValidation
            ->expects($this->once())
            ->method('setValidations')
            ->willReturnSelf();

        $groupValidation
            ->expects($this->once())
            ->method('dispatch')
            ->willReturnSelf();

        $groupValidation->setValidations($mock);
        $result = $groupValidation->dispatch();
        $this->assertInstanceOf(GroupValidation::class, $result);
    }
}
