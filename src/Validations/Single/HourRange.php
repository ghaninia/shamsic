<?php

namespace GhaniniaIR\Schedule\Validations\Single;

use GhaniniaIR\Schedule\Validations\Single\Interfaces\ValidationContract;

class HourRange implements ValidationContract
{
    public function passes($value): bool
    {
        if(!is_numeric($value)) {
            return false;
        }

        return $value >= 0 && $value <= 23;
    }

    public function message(): string
    {
        return 'The hour range must be a number between 0 and 23.';
    }
}
