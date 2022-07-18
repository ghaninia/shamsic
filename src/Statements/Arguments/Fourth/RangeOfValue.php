<?php

namespace GhaniniaIR\Schedule\Statements\Arguments\Fourth;

use GhaniniaIR\Schedule\Statements\Contracts\StatementArgumentContract;

class RangeOfValue extends StatementArgumentContract
{
    public function passed(): bool
    {
        $month = $this->value;
        $currentMonth = $this->jalaliCalender()->getMonth();

        $splitMonths = explode('-', $month);
        $startMonth = $splitMonths[0];
        $endMonth = $splitMonths[1];

        return $currentMonth >= $startMonth && $currentMonth <= $endMonth;
    }
}
