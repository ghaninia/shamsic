<?php

namespace GhaniniaIR\Schedule\Statements\Arguments\First;

use GhaniniaIR\Schedule\Statements\Contracts\StatementArgumentContract;

class MinuteRange extends StatementArgumentContract
{
    public function passed(): bool
    {
        $minute = $this->value;
        $currentMinute = $this->jalaliCalender()->getMinute();
        return $minute == $currentMinute;
    }
}
