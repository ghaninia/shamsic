<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\Schedule\Structrue\JalaliCalender;
use GhaniniaIR\Schedule\Statements\Arguments\Fourth\Seprator;
use GhaniniaIR\Schedule\Statements\Arguments\Fourth\StepValue;
use GhaniniaIR\Schedule\Statements\Arguments\Fourth\MonthRange;
use GhaniniaIR\Schedule\Statements\Arguments\Fourth\RangeOfValue;

class FourthArgumentStatementTest extends TestCase
{
    protected JalaliCalender $jalaliCalenderMock;

    protected function setUp(): void
    {
        parent::setUp();
        $this->jalaliCalenderMock = $this->getMockBuilder(JalaliCalender::class)->getMock();
        $this->jalaliCalenderMock->expects(self::any())->method("getMonth")->willReturn(10);
    }

    /**
     * @test 
     */
    public function MonthRangeCondition()
    {
        $result = (new MonthRange(10, $this->jalaliCalenderMock))->passed();
        $this->assertTrue($result);

        $result = (new MonthRange(13, $this->jalaliCalenderMock))->passed();
        $this->assertFalse($result);
    }

    /**
     * @test 
     */
    public function sepratorCondition()
    {
        $result = (new Seprator("10,2,3,4,5", $this->jalaliCalenderMock))->passed();
        $this->assertTrue($result);

        $result = (new Seprator("13,14", $this->jalaliCalenderMock))->passed();
        $this->assertFalse($result);
    }

    /**
     * @test 
     */
    public function rangeOfValueCondition()
    {
        $result = (new RangeOfValue("5-12", $this->jalaliCalenderMock))->passed();
        $this->assertTrue($result);

        $result = (new RangeOfValue("11-20", $this->jalaliCalenderMock))->passed();
        $this->assertFalse($result);

        $result = (new RangeOfValue("20-30", $this->jalaliCalenderMock))->passed();
        $this->assertFalse($result);
    }

    /**
     * @test 
     */
    public function stepValueCondition()
    {
        $result = (new StepValue("*/10", $this->jalaliCalenderMock))->passed();
        $this->assertTrue($result);

        $result = (new StepValue("*/30", $this->jalaliCalenderMock))->passed();
        $this->assertFalse($result);
    }
}
