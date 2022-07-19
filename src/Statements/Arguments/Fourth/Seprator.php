<?php

namespace GhaniniaIR\Shamsic\Statements\Arguments\Fourth;

use GhaniniaIR\Shamsic\Statements\Contracts\StatementArgumentContract;

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
