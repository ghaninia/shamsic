<?php

namespace GhaniniaIR\Shamsic\Statements\Arguments\Fifth;

use GhaniniaIR\Shamsic\Statements\Contracts\StatementArgumentContract;

class Seprator extends StatementArgumentContract
{
    public function passed(): bool
    {
        $currentDayOfWeek = $this->jalaliCalender()->getDayOfWeek();
        foreach (explode(",", $this->value) as $value) {
            if ($value == $currentDayOfWeek) {
                return true;
            }
        }
        return false;
    }
}
