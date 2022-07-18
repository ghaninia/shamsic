<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\SolarCron\Structrue\JalaliCalender;
use GhaniniaIR\SolarCron\Statements\Arguments\Second\Seprator;
use GhaniniaIR\SolarCron\Statements\Arguments\Second\HourRange;
use GhaniniaIR\SolarCron\Statements\Arguments\Second\StepValue;
use GhaniniaIR\SolarCron\Statements\Arguments\Second\RangeOfValue;

class SecondArgumentStatementTest extends TestCase
{
    protected JalaliCalender $jalaliCalenderMock;

    protected function setUp(): void
    {
        parent::setUp();
        $this->jalaliCalenderMock = $this->getMockBuilder(JalaliCalender::class)->getMock();
        $this->jalaliCalenderMock->expects(self::any())->method("getHour")->willReturn(22);
    }

    /**
     * @test 
     */
    public function hourRangeCondition()
    {

        $result = (new HourRange(22, $this->jalaliCalenderMock))->passed();
        $this->assertTrue($result);

        $result = (new HourRange(2, $this->jalaliCalenderMock))->passed();
        $this->assertFalse($result);
    }

    /**
     * @test 
     */
    public function sepratorCondition()
    {
        $result = (new Seprator("22,2,3,4,5", $this->jalaliCalenderMock))->passed();
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

        $result = (new RangeOfValue("0-9", $this->jalaliCalenderMock))->passed();
        $this->assertFalse($result);

        $result = (new RangeOfValue("9-10", $this->jalaliCalenderMock))->passed();
        $this->assertFalse($result);
    }

    /**
     * @test 
     */
    public function stepValueCondition()
    {
        $result = (new StepValue("*/22", $this->jalaliCalenderMock))->passed();
        $this->assertTrue($result);

        $result = (new StepValue("*/3", $this->jalaliCalenderMock))->passed();
        $this->assertFalse($result);
    }
}
