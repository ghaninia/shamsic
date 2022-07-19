<?php

namespace GhaniniaIR\Shamsic\Statements\Arguments\Fifth;

use GhaniniaIR\Shamsic\Statements\Contracts\StatementArgumentContract;

class DayOfWeekRange extends StatementArgumentContract
{
    public function passed(): bool
    {
        $dayOfWeek = $this->value;
        $currentDayOfWeek = $this->jalaliCalender()->getDayOfWeek();
        return $dayOfWeek == $currentDayOfWeek;
    }
}
