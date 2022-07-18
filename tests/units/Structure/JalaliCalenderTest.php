<?php

use Morilog\Jalali\Jalalian;
use PHPUnit\Framework\TestCase;
use GhaniniaIR\SolarCron\Structrue\JalaliCalender;

class JalaliCalenderTest extends TestCase
{

    protected JalaliCalender $jalaliCalender;

    protected function setUp(): void
    {
        parent::setUp();
        $datetime = new DateTime("2020-01-01 00:00:00");
        $timeZone = new DateTimeZone("Asia/Tehran");
        $this->jalaliCalender = new JalaliCalender($datetime, $timeZone);
    }

    public function testGetJalaliDateTime()
    {
        $this->assertInstanceOf(Jalalian::class, $result = $this->jalaliCalender->getJalaliDateTime());
    }

    public function testGetCurrentDate()
    {
        $this->assertEquals('1398-10-11', $this->jalaliCalender->getCurrentDate());
    }

    public function testGetCurrentTime()
    {

        $this->assertEquals('03:30:00', $this->jalaliCalender->getCurrentTime());
    }

    public function testGetYear()
    {

        $this->assertEquals(1398, $this->jalaliCalender->getYear());
    }

    public function testGetMonth()
    {

        $this->assertEquals(10, $this->jalaliCalender->getMonth());
    }

    public function testGetDay()
    {

        $this->assertEquals(11, $this->jalaliCalender->getDay());
    }

    public function testGetHour()
    {

        $this->assertEquals(3, $this->jalaliCalender->getHour());
    }

    public function testGetMinute()
    {

        $this->assertEquals(30, $this->jalaliCalender->getMinute());
    }

    public function testGetSecond()
    {

        $this->assertEquals(0, $this->jalaliCalender->getSecond());
    }

    public function testGetWeekDay()
    {
        $this->assertEquals(4, $this->jalaliCalender->getWeekDay());
    }

    public function testGetWeekOfYear()
    {
        $this->assertEquals(41, $this->jalaliCalender->getWeekOfYear());
    }

    public function testGetDayOfYear()
    {
        $this->assertEquals(287, $this->jalaliCalender->getDayOfYear());
    }

    public function testGetDayOfMonth()
    {
        $this->assertEquals(11, $this->jalaliCalender->getDayOfMonth());
    }

    public function testGetDayOfWeek()
    {
        $this->assertEquals(5, $this->jalaliCalender->getDayOfWeek());
    }

    public function testGetWeekOfMonth()
    {
        $this->assertEquals(41, $this->jalaliCalender->getWeekOfMonth());
    }

    public function testGetDayOfWeekInMonth()
    {
        $this->assertEquals(41, $this->jalaliCalender->getDayOfWeekInMonth());
    }

    public function testGetDayOfWeekInYear()
    {
        $this->assertEquals(287, $this->jalaliCalender->getDayOfWeekInYear());
    }
}
