<?php

namespace GhaniniaIR\Schedule\Statements\Arguments\Fifth;

use GhaniniaIR\Schedule\Statements\Contracts\StatementArgumentContract;

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
