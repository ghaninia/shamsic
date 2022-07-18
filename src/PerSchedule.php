<?php

namespace GhaniniaIR\Schedule;

use GhaniniaIR\Schedule\Structrue\JalaliCalender;

class PerSchedule
{
    public function __construct(
        private string $expression,
        private $callback,
        private ?JalaliCalender $jalaliCalender = null
    ) {
    }

    /**
     * @return string
     */
    public function getExpression()
    {
        return $this->expression;
    }

    /**
     * @return callable
     */
    public function getCallaback(): callable
    {
        return $this->callback;
    }

    /**
     * @return mixed
     */
    public function run()
    {
        $expression = new ExecuteExpression($this->expression, $this->jalaliCalender);
        $result = $expression->dispath()->canRunCallaback();
        $callback = $this->callback;
        return $result ? $callback() : false;
    }
}
