<?php

namespace GhaniniaIR\Schedule;

class Schedule
{
    protected static array $schedules = [];
    protected $scheduleCallable;
    protected $scheduleExpression;

    /**
     * add Cron Expression to schedules
     * @param string $expression
     * @param callable $callback
     * @return self
     */
    public function call(callable $scheduleCallable)
    {
        $this->scheduleCallable = $scheduleCallable;
        return $this;
    }

    /**
     * add Cron Expression to schedules
     * @param string $expression
     * @return void 
     */
    final protected function cron(string $expression)
    {
        $this->scheduleExpression = $expression;
        $this->add();
    }


    /**
     * set Cron Expression
     * @return void 
     */
    private function add()
    {
        self::$schedules[] = new PerSchedule(
            $this->scheduleExpression,
            $this->scheduleCallable
        );
    }

    /**
     * run Cron Expressions
     * @return void 
     */
    public static function run()
    {
        foreach (self::$schedules as $schedule) {
            $schedule->run();
        }
    }
}
