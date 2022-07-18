<?php

namespace GhaniniaIR\SolarCron\Statements\Arguments\Second;

use GhaniniaIR\SolarCron\Statements\Contracts\StatementArgumentContract;

class HourRange extends StatementArgumentContract
{
    public function passed(): bool
    {
        $hour = $this->value;
        $currentHour = $this->jalaliCalender()->getHour();
        return $hour == $currentHour;
    }
}
