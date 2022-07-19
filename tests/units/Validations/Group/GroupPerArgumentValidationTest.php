<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\Shamsic\Validations\Group\GroupPerArgumentValidation;
use GhaniniaIR\Shamsic\Validations\Single\Interfaces\ValidationContract;

class GroupPerArgumentValidationTest extends TestCase
{
    /** @test */
    public function setValidations()
    {
        $mock = $this->createMock(ValidationContract::class);
        $mock->method('passes')->with(1)->willReturn(true);

        $GroupPerArgumentValidation = $this->getMockBuilder(GroupPerArgumentValidation::class)
            ->setConstructorArgs([1])
            ->getMock();

        $GroupPerArgumentValidation
            ->expects($this->once())
            ->method('setValidations')
            ->willReturnSelf();

        $result = $GroupPerArgumentValidation->setValidations($mock);
        $this->assertInstanceOf(GroupPerArgumentValidation::class, $result);
    }

    /** @test */
    public function dispatch()
    {
        $mock = $this->createMock(ValidationContract::class);
        $mock->method('passes')->with(1)->willReturn(true);

        $GroupPerArgumentValidation = $this->getMockBuilder(GroupPerArgumentValidation::class)
            ->setConstructorArgs([1])
            ->getMock();

        $GroupPerArgumentValidation
            ->expects($this->once())
            ->method('setValidations')
            ->willReturnSelf();

        $GroupPerArgumentValidation
            ->expects($this->once())
            ->method('dispatch')
            ->willReturnSelf();

        $GroupPerArgumentValidation->setValidations($mock);
        $result = $GroupPerArgumentValidation->dispatch();
        $this->assertInstanceOf(GroupPerArgumentValidation::class, $result);
    }
}
