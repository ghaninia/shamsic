<?php

namespace GhaniniaIR\SolarCron\Conditions\Arguments\First;

use GhaniniaIR\SolarCron\Conditions\Contracts\ConditionArgumentContract;

class StepValue extends ConditionArgumentContract
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
