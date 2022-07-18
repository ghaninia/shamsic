<?php

namespace GhaniniaIR\SolarCron\Conditions\Arguments\First;

use GhaniniaIR\SolarCron\Conditions\Contracts\ConditionArgumentContract;

class RangeOfValue extends ConditionArgumentContract
{
    public function passed(): bool
    {
        $minutes = $this->value;
        $currentMinute = $this->jalaliCalender()->getMinute();

        $splitMinutes = explode('-', $minutes);
        $startMinute = $splitMinutes[0];
        $endMinute = $splitMinutes[1];

        return $currentMinute >= $startMinute && $currentMinute <= $endMinute;
    }
}
