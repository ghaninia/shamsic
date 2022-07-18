<?php

namespace GhaniniaIR\Schedule\Statements\Arguments\Second;

use GhaniniaIR\Schedule\Statements\Contracts\StatementArgumentContract;

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
