<?php

namespace GhaniniaIR\Schedule\Statements\Arguments\Third;

use GhaniniaIR\Schedule\Statements\Contracts\StatementArgumentContract;

class StepValue extends StatementArgumentContract
{
    public function passed(): bool
    {
        $currentDayOfMonth = $this->jalaliCalender()->getDayOfMonth();
        $expressionDayOfMonth = $this->value;
        $values = explode("/", $expressionDayOfMonth);
        $step = $values[1];
        
        return $currentDayOfMonth % $step == 0;
    }
}
