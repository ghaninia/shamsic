<?php

namespace GhaniniaIR\Shamsic\Statements\Arguments\Third;

use GhaniniaIR\Shamsic\Statements\Contracts\StatementArgumentContract;

class DayOfMonthRange extends StatementArgumentContract
{
    public function passed(): bool
    {
        $hour = $this->value;
        $currentDayOfMonth = $this->jalaliCalender()->getDayOfMonth();
        return $hour == $currentDayOfMonth;
    }
}
