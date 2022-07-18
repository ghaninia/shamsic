<?php

namespace GhaniniaIR\Schedule\Statements\Arguments\Fourth;

use GhaniniaIR\Schedule\Statements\Contracts\StatementArgumentContract;

class StepValue extends StatementArgumentContract
{
    public function passed(): bool
    {
        $currentMonth = $this->jalaliCalender()->getMonth();
        $expressionMonth = $this->value;
        $values = explode("/", $expressionMonth);
        $step = $values[1];
        return $currentMonth % $step == 0;
    }
}
