<?php

namespace GhaniniaIR\Shamsic\Statements\Arguments\Fifth;

use GhaniniaIR\Shamsic\Statements\Contracts\StatementArgumentContract;

class StepValue extends StatementArgumentContract
{
    public function passed(): bool
    {
        $currentDayOfWeek = $this->jalaliCalender()->getDayOfWeek();
        $expressionDayOfWeek = $this->value;
        $values = explode("/", $expressionDayOfWeek);
        $step = $values[1];
        return $currentDayOfWeek % $step == 0;
    }
}
