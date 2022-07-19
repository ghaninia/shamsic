<?php

namespace GhaniniaIR\Shamsic\Statements\Arguments\Third;

use GhaniniaIR\Shamsic\Statements\Contracts\StatementArgumentContract;

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
