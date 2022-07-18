<?php

namespace GhaniniaIR\SolarCron\Statements\Arguments\First;

use GhaniniaIR\SolarCron\Statements\Contracts\StatementArgumentContract;

class MinuteRange extends StatementArgumentContract
{
    public function passed(): bool
    {
        $minute = $this->value;
        $currentMinute = $this->jalaliCalender()->getMinute();
        return $minute == $currentMinute;
    }
}
