<?php

namespace GhaniniaIR\Shamsic;

use GhaniniaIR\Shamsic\Classes\PredeterminationDateTime;

class Schedule extends PredeterminationDateTime
{
    protected static array $schedules = [];
    protected $scheduleExpression;
    protected $scheduleCallable;

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
    final public function cron(string $expression)
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
        static::$schedules[] = new PerSchedule(
            $this->scheduleExpression,
            $this->scheduleCallable,
            $this->getCalender()
        );
    }

    /**
     * run Cron Expressions
     * @return void 
     */
    public static function run()
    {
        foreach (static::$schedules as $schedule) {
            $schedule->run();
        }

        static::$schedules = [] ;

        return true;
    }
}
