<?php

namespace GhaniniaIR\Shamsic\Statements\Arguments\First;

use GhaniniaIR\Shamsic\Statements\Contracts\StatementArgumentContract;

class MinuteRange extends StatementArgumentContract
{
    public function passed(): bool
    {
        $minute = $this->value;
        $currentMinute = $this->jalaliCalender()->getMinute();
        return $minute == $currentMinute;
    }
}
