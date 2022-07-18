<?php

namespace GhaniniaIR\Schedule\Statements\Arguments\First;

use GhaniniaIR\Schedule\Statements\Contracts\StatementArgumentContract;

class RangeOfValue extends StatementArgumentContract
{
    public function passed(): bool
    {
        $minutes = $this->value;
        $currentMinute = $this->jalaliCalender()->getMinute();

        $splitMinutes = explode('-', $minutes);
        $startMinute = $splitMinutes[0];
        $endMinute = $splitMinutes[1];

        return $currentMinute >= $startMinute && $currentMinute <= $endMinute;
    }
}
