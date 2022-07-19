<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\Shamsic\Schedule;

class ScheduleTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->schedule = new class extends Schedule
        {
            public static array $schedules = [];
        };
    }

    /**
     * @test
     */
    public function addItemInScheduleList()
    {
        $this->schedule->call(fn () => null)->cron('* * * * *');
        $this->assertEquals(1, count($this->schedule::$schedules));
    }

    /**
     * @test
     */
    public function runScheduleList()
    {
        $this->schedule->call(fn () => null)->cron('* * * * *');
        $this->assertTrue(Schedule::run());
    }
}
