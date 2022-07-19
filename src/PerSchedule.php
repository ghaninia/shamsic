<?php

namespace GhaniniaIR\Shamsic;

use GhaniniaIR\Shamsic\Classes\PredeterminationDateTime;

class PerSchedule extends PredeterminationDateTime
{
    public function __construct(
        private string $expression,
        private $callback,
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
        $expression = new ExecuteExpression($this->expression, $this->getCalender());
        $result = $expression->dispath()->canRunCallaback();
        $callback = $this->callback;
        return $result ? $callback() : false;
    }
}
