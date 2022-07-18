<?php

namespace GhaniniaIR\Schedule\Statements\Arguments\Third;

use GhaniniaIR\Schedule\Statements\Contracts\StatementArgumentContract;

class DayOfMonthRange extends StatementArgumentContract
{
    public function passed(): bool
    {
        $hour = $this->value;
        $currentDayOfMonth = $this->jalaliCalender()->getDayOfMonth();
        return $hour == $currentDayOfMonth;
    }
}
