<?php

namespace GhaniniaIR\SolarCron\Conditions\Arguments\First;

use GhaniniaIR\SolarCron\Conditions\Contracts\ConditionArgumentContract;

class MinuteRange extends ConditionArgumentContract
{
    public function passed(): bool
    {
        $minute = $this->value;
        $currentMinute = $this->jalaliCalender()->getMinute();
        return $minute == $currentMinute;
    }
}
