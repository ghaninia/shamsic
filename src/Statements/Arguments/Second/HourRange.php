<?php

namespace GhaniniaIR\Schedule\Statements\Arguments\Second;

use GhaniniaIR\Schedule\Statements\Contracts\StatementArgumentContract;

class HourRange extends StatementArgumentContract
{
    public function passed(): bool
    {
        $hour = $this->value;
        $currentHour = $this->jalaliCalender()->getHour();
        return $hour == $currentHour;
    }
}
