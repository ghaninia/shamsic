<?php

namespace GhaniniaIR\SolarCron\Validations\Single;

use GhaniniaIR\SolarCron\Validations\Single\Interfaces\ValidationContract;

class MonthRange implements ValidationContract
{
    public function passes($value): bool
    {
        if(!is_numeric($value)) {
            return false;
        }

        return $value >= 1 && $value <= 12;
    }

    public function message(): string
    {
        return 'The month range must be a number between 1 and 12.';
    }
}
