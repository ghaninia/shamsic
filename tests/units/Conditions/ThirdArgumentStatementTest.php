<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\Schedule\Classes\JalaliCalender;
use GhaniniaIR\Schedule\Statements\Arguments\Third\Seprator;
use GhaniniaIR\Schedule\Statements\Arguments\Third\StepValue;
use GhaniniaIR\Schedule\Statements\Arguments\Third\RangeOfValue;
use GhaniniaIR\Schedule\Statements\Arguments\Third\DayOfMonthRange;

class ThirdArgumentStatementTest extends TestCase
{
    protected JalaliCalender $jalaliCalenderMock;

    protected function setUp(): void
    {
        parent::setUp();
        $this->jalaliCalenderMock = $this->getMockBuilder(JalaliCalender::class)->getMock();
        $this->jalaliCalenderMock->expects(self::any())->method("getDayOfMonth")->willReturn(10);
    }


    /**
     * @test 
     */
    public function dayOfMonthRangeCondition()
    {
        $result = (new DayOfMonthRange( 10, $this->jalaliCalenderMock))->passed();
        $this->assertTrue($result);

        $result = (new DayOfMonthRange(11, $this->jalaliCalenderMock))->passed();
        $this->assertFalse($result);
    }


    /**
     * @test 
     */
    public function sepratorCondition()
    {
        $result = (new Seprator("10,2,3,4,5", $this->jalaliCalenderMock))->passed();
        $this->assertTrue($result);

        $result = (new Seprator("2,3,4,5", $this->jalaliCalenderMock))->passed();
        $this->assertFalse($result);
    }

    /**
     * @test 
     */
    public function rangeOfValueCondition()
    {
        $result = (new RangeOfValue("5-23", $this->jalaliCalenderMock))->passed();
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
        
        $result = (new StepValue("*/5", $this->jalaliCalenderMock))->passed();
        $this->assertTrue($result);

        $result = (new StepValue("*/3", $this->jalaliCalenderMock))->passed();
        $this->assertFalse($result);
    }
}
