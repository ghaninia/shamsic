<?php

namespace GhaniniaIR\Shamsic\Validations\Single;

use GhaniniaIR\Shamsic\Validations\Single\Interfaces\ValidationContract;

class DayOfWeekRange implements ValidationContract
{
    public function passes($value): bool
    {
        if(!is_numeric($value)) {
            return false;
        }

        return $value >= 1 && $value <= 7;
    }

    public function message(): string
    {
        return 'The days of the week range must be a number between 1 and 7.';
    }
}
