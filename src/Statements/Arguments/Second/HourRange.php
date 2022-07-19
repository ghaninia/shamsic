<?php

namespace GhaniniaIR\Shamsic\Statements\Arguments\Second;

use GhaniniaIR\Shamsic\Statements\Contracts\StatementArgumentContract;

class HourRange extends StatementArgumentContract
{
    public function passed(): bool
    {
        $hour = $this->value;
        $currentHour = $this->jalaliCalender()->getHour();
        return $hour == $currentHour;
    }
}
