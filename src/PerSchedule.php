<?php

namespace GhaniniaIR\Schedule;

class PerSchedule
{
    public function __construct(
        private string $expression,
        private $callback
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
        $expression = new ExecuteExpression($this->expression);
        $result = $expression->dispath()->canRunCallaback();
        $callback = $this->callback;
        return $result ? $callback() : false;
    }
}
