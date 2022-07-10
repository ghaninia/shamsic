<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\SolarCron\Validations\Group\GroupValidation;
use GhaniniaIR\SolarCron\Validations\Single\Interfaces\ValidationContract;

class GroupValidationTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();

        $this->instanceGroupValidation = new class extends GroupValidation
        {
            public array $validations = [];
        };
    }

    /**
     * @test
     */
    public function setValidations()
    {
        $mock = $this->createMock(ValidationContract::class);
        $mock->method('passes')->willReturn(true);

        $groupValidation = $this->getMockBuilder(GroupValidation::class)
            ->disableOriginalConstructor()
            ->getMock();

        $groupValidation
            ->expects($this->once())
            ->method('setValidations')
            ->with($mock);

    }
}
