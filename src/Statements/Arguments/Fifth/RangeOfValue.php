<?php

namespace GhaniniaIR\Shamsic\Statements\Arguments\Fifth;

use GhaniniaIR\Shamsic\Statements\Contracts\StatementArgumentContract;

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
