<?php

namespace GhaniniaIR\Shamsic\Statements\Arguments\Second;

use GhaniniaIR\Shamsic\Statements\Contracts\StatementArgumentContract;

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
