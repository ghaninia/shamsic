<?php

namespace GhaniniaIR\Schedule\Statements\Arguments\Fifth;

use GhaniniaIR\Schedule\Statements\Contracts\StatementArgumentContract;

class DayOfWeekRange extends StatementArgumentContract
{
    public function passed(): bool
    {
        $dayOfWeek = $this->value;
        $currentDayOfWeek = $this->jalaliCalender()->getDayOfWeek();
        return $dayOfWeek == $currentDayOfWeek;
    }
}
