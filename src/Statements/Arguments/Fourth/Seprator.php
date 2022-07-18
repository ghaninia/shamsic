<?php

namespace GhaniniaIR\Schedule\Statements\Arguments\Fourth;

use GhaniniaIR\Schedule\Statements\Contracts\StatementArgumentContract;

class Seprator extends StatementArgumentContract
{
    public function passed(): bool
    {
        $currentMonth = $this->jalaliCalender()->getMonth();
        foreach (explode(",", $this->value) as $value) {
            if ($value == $currentMonth) {
                return true;
            }
        }
        return false;
    }
}
