<?php

namespace GhaniniaIR\Cron\Validations\Single;

use GhaniniaIR\Cron\Validations\Interfaces\ValidationContract;

class DaysOfWeekRange implements ValidationContract
{
    public function passes($value): bool
    {
        return $value >= 1 && $value <= 7;
    }

    public function message(): string
    {
        return 'The days of the week range must be a number between 1 and 7.';
    }
}
