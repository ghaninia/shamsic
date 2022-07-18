<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\Schedule\PerSchedule;
use GhaniniaIR\Schedule\Classes\JalaliCalender;

class PerScheduleTest extends TestCase
{
    /** @test */
    public function canRunCallaback()
    {
        $perSchedule = new PerSchedule('* * * * *', function () {
            return true;
        });
        $this->assertTrue($perSchedule->run());
    }

    /** @test */
    public function canRunCallabackWithJalaliCalender()
    {
        $datetime = new DateTime("2012-01-01 00:00:00");
        $jalaliDateTime = new JalaliCalender($datetime);
        $perSchedule = new PerSchedule('* * * * 10', function () {
            return true;
        }, $jalaliDateTime);
        $this->assertFalse($perSchedule->run());
    }

    /** @test */
    public function getExpression()
    {
        $perSchedule = new PerSchedule('* * * * *', function () {
            return true;
        });

        $this->assertEquals('* * * * *', $perSchedule->getExpression());
    }

    /** @test */
    public function getCallaback()
    {
        $perSchedule = new PerSchedule('* * * * *', $statement = function () {
            return true;
        });
        $this->assertEquals($statement, $perSchedule->getCallaback());
        $this->assertIsCallable($perSchedule->getCallaback());
    }

    /** @test */
    public function checkExecutePerSchedule()
    {

        $datetime = new DateTime("2012-01-01 20:00:00");
        $jalaliDateTime = new JalaliCalender($datetime);

        $perSchedule = new PerSchedule('* 20 * * *', $statement = function () {
            return "test 1";
        });

        $this->assertEquals("test 1", $perSchedule->setCalender($jalaliDateTime)->run());

        $perSchedule = new PerSchedule('* 21 * * *', $statement = function () {
            return "test 1";
        });

        $this->assertEquals(false, $perSchedule->setCalender($jalaliDateTime)->run());
    }
}
