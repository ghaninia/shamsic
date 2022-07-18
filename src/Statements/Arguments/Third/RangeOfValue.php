<?php

namespace GhaniniaIR\Schedule\Statements\Arguments\Third;

use GhaniniaIR\Schedule\Statements\Contracts\StatementArgumentContract;

class RangeOfValue extends StatementArgumentContract
{
    public function passed(): bool
    {
        $dayOfMonth = $this->value;
        $currentDayOfMonth = $this->jalaliCalender()->getDayOfMonth();

        $splitDayOfMonths = explode('-', $dayOfMonth);
        $startDayOfMonth = $splitDayOfMonths[0];
        $endDayOfMonth = $splitDayOfMonths[1];

        return $currentDayOfMonth >= $startDayOfMonth && $currentDayOfMonth <= $endDayOfMonth;
    }
}
