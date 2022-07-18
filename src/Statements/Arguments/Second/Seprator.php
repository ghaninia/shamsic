<?php

namespace GhaniniaIR\SolarCron\Statements\Arguments\Second;

use GhaniniaIR\SolarCron\Statements\Contracts\StatementArgumentContract;

class Seprator extends StatementArgumentContract
{
    public function passed(): bool
    {
        $currentHour = $this->jalaliCalender()->getHour();
        foreach (explode(",", $this->value) as $value) {
            if ($value == $currentHour) {
                return true;
            }
        }
        return false;
    }
}
