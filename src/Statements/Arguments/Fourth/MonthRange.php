<?php

namespace GhaniniaIR\Shamsic\Statements\Arguments\Fourth;

use GhaniniaIR\Shamsic\Statements\Contracts\StatementArgumentContract;

class MonthRange extends StatementArgumentContract
{
    public function passed(): bool
    {
        $month = $this->value;
        $currentMonth = $this->jalaliCalender()->getMonth();
        return $month == $currentMonth;
    }
}
