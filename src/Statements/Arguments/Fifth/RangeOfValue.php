<?php

namespace GhaniniaIR\Schedule\Statements\Arguments\Fifth;

use GhaniniaIR\Schedule\Statements\Contracts\StatementArgumentContract;

class RangeOfValue extends StatementArgumentContract
{
    public function passed(): bool
    {
        $dayOfWeek = $this->value;
        $currentDayOfWeek = $this->jalaliCalender()->getDayOfWeek();

        $splitDayOfWeek = explode('-', $dayOfWeek);
        $startDayOfWeek = $splitDayOfWeek[0];
        $endDayOfWeek = $splitDayOfWeek[1];

        return $currentDayOfWeek >= $startDayOfWeek && $currentDayOfWeek <= $endDayOfWeek;
    }
}
