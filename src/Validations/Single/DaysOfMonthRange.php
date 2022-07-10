<?php

namespace GhaniniaIR\Cron\Validations\Single;

use GhaniniaIR\Cron\Validations\Interfaces\ValidationContract;

class DaysOfMonthRange implements ValidationContract
{
    public function passes($value): bool
    {
        return $value >= 1 && $value <= 31;
    }

    public function message(): string
    {
        return 'The days of the month range must be a number between 1 and 31.';
    }
}
