<?php

namespace GhaniniaIR\Shamsic\Statements\Arguments\Second;

use GhaniniaIR\Shamsic\Statements\Contracts\StatementArgumentContract;

class RangeOfValue extends StatementArgumentContract
{
    public function passed(): bool
    {
        $hours = $this->value;
        $currentHour = $this->jalaliCalender()->getHour();

        $splitHours = explode('-', $hours);
        $startHour = $splitHours[0];
        $endHour = $splitHours[1];

        return $currentHour >= $startHour && $currentHour <= $endHour;
    }
}
