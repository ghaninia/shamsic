<?php

namespace GhaniniaIR\Schedule\Statements\Arguments\First;

use GhaniniaIR\Schedule\Statements\Contracts\StatementArgumentContract;

class Seprator extends StatementArgumentContract
{
    public function passed(): bool
    {
        $currentMinute = $this->jalaliCalender()->getMinute();
        foreach (explode(",", $this->value) as $value) {
            if ($value == $currentMinute) {
                return true;
            }
        }
        return false;
    }
}
