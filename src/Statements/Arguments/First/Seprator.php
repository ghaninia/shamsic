<?php

namespace GhaniniaIR\Shamsic\Statements\Arguments\First;

use GhaniniaIR\Shamsic\Statements\Contracts\StatementArgumentContract;

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
