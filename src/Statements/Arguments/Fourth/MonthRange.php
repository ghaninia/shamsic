<?php

namespace GhaniniaIR\Schedule\Statements\Arguments\Fourth;

use GhaniniaIR\Schedule\Statements\Contracts\StatementArgumentContract;

class MonthRange extends StatementArgumentContract
{
    public function passed(): bool
    {
        $month = $this->value;
        $currentMonth = $this->jalaliCalender()->getMonth();
        return $month == $currentMonth;
    }
}
