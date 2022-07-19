<?php

namespace GhaniniaIR\Shamsic\Statements\Arguments\First;

use GhaniniaIR\Shamsic\Statements\Contracts\StatementArgumentContract;

class StepValue extends StatementArgumentContract
{
    public function passed(): bool
    {
        $currentMinute = $this->jalaliCalender()->getMinute();
        $expressionMinute = $this->value;
        $values = explode("/", $expressionMinute);
        $step = $values[1];
        return $currentMinute % $step == 0;
    }
}
