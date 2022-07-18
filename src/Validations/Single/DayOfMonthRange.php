<?php

namespace GhaniniaIR\Schedule\Validations\Single;

use GhaniniaIR\Schedule\Validations\Single\Interfaces\ValidationContract;

class DayOfMonthRange implements ValidationContract
{
    public function passes($value): bool
    {
        if(!is_numeric($value)) {
            return false;
        }

        return $value >= 1 && $value <= 31;
    }

    public function message(): string
    {
        return 'The days of the month range must be a number between 1 and 31.';
    }
}
