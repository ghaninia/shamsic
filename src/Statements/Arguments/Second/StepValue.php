<?php

namespace GhaniniaIR\Schedule\Statements\Arguments\Second;

use GhaniniaIR\Schedule\Statements\Contracts\StatementArgumentContract;

class StepValue extends StatementArgumentContract
{
    public function passed(): bool
    {
        $currentHour = $this->jalaliCalender()->getHour();
        $expressionHour = $this->value;
        $values = explode("/", $expressionHour);
        $step = $values[1];
        return $currentHour % $step == 0;
    }
}
