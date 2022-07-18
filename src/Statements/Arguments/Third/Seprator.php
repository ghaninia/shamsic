<?php

namespace GhaniniaIR\Schedule\Statements\Arguments\Third;

use GhaniniaIR\Schedule\Statements\Contracts\StatementArgumentContract;

class Seprator extends StatementArgumentContract
{
    public function passed(): bool
    {
        $currentDayOfMonth = $this->jalaliCalender()->getDayOfMonth();
        foreach (explode(",", $this->value) as $value) {
            if ($value == $currentDayOfMonth) {
                return true;
            }
        }
        return false;
    }
}
