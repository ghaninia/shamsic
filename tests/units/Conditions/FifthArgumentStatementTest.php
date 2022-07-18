<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\Schedule\Structrue\JalaliCalender;
use GhaniniaIR\Schedule\Statements\Arguments\Fifth\Seprator;
use GhaniniaIR\Schedule\Statements\Arguments\Fifth\StepValue;
use GhaniniaIR\Schedule\Statements\Arguments\Fifth\RangeOfValue;
use GhaniniaIR\Schedule\Statements\Arguments\Fifth\DayOfWeekRange;

class FifthArgumentStatementTest extends TestCase
{
    protected JalaliCalender $jalaliCalenderMock;

    protected function setUp(): void
    {
        parent::setUp();
        $this->jalaliCalenderMock = $this->getMockBuilder(JalaliCalender::class)->getMock();
        $this->jalaliCalenderMock->expects(self::any())->method("getDayOfWeek")->willReturn(5);
    }

    /**
     * @test 
     */
    public function dayOfWeekRangeCondition()
    {
        $result = (new DayOfWeekRange(5, $this->jalaliCalenderMock))->passed();
        $this->assertTrue($result);

        $result = (new DayOfWeekRange(8, $this->jalaliCalenderMock))->passed();
        $this->assertFalse($result);
    }

    /**
     * @test 
     */
    public function sepratorCondition()
    {
        $result = (new Seprator("2,3,4,5", $this->jalaliCalenderMock))->passed();
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
        $result = (new StepValue("*/5", $this->jalaliCalenderMock))->passed();
        $this->assertTrue($result);

        $result = (new StepValue("*/20", $this->jalaliCalenderMock))->passed();
        $this->assertFalse($result);
    }
}
