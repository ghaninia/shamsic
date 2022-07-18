<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\SolarCron\Structrue\JalaliCalender;
use GhaniniaIR\SolarCron\Statements\Arguments\First\Seprator;
use GhaniniaIR\SolarCron\Statements\Arguments\First\StepValue;
use GhaniniaIR\SolarCron\Statements\Arguments\First\MinuteRange;
use GhaniniaIR\SolarCron\Statements\Arguments\First\RangeOfValue;

class FirstArgumentStatementTest extends TestCase
{
    protected JalaliCalender $jalaliCalenderMock;

    protected function setUp(): void
    {
        parent::setUp();
        $this->jalaliCalenderMock = $this->getMockBuilder(JalaliCalender::class)->getMock();
        $this->jalaliCalenderMock->expects(self::any())->method("getMinute")->willReturn(39);
    }

    /**
     * @test 
     */
    public function minuteRangeCondition()
    {

        $result = (new MinuteRange(39, $this->jalaliCalenderMock))->passed();
        $this->assertTrue($result);

        $result = (new MinuteRange(2, $this->jalaliCalenderMock))->passed();
        $this->assertFalse($result);
    }

    /**
     * @test 
     */
    public function sepratorCondition()
    {
        $result = (new Seprator("39,2,3,4,5", $this->jalaliCalenderMock))->passed();
        $this->assertTrue($result);

        $result = (new Seprator("2,3,4,5", $this->jalaliCalenderMock))->passed();
        $this->assertFalse($result);
    }

    /**
     * @test 
     */
    public function stepValueCondition()
    {
        $result = (new StepValue("*/39", $this->jalaliCalenderMock))->passed();
        $this->assertTrue($result);

        $result = (new StepValue("*/2", $this->jalaliCalenderMock))->passed();
        $this->assertFalse($result);
    }

    /**
     * @test 
     */
    public function rangeOfValueCondition()
    {
        $result = (new RangeOfValue("5-39", $this->jalaliCalenderMock))->passed();
        $this->assertTrue($result);

        $result = (new RangeOfValue("0-9", $this->jalaliCalenderMock))->passed();
        $this->assertFalse($result);

        $result = (new RangeOfValue("0-9", $this->jalaliCalenderMock))->passed();
        $this->assertFalse($result);

    }
}
