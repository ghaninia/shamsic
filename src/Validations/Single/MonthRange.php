<?php

namespace GhaniniaIR\Croni\Validations;

use GhaniniaIR\Cron\Validations\Interfaces\ValidationContract;

class MonthRange implements ValidationContract
{
    public function passes($value): bool
    {
        return $value >= 1 && $value <= 12;
    }

    public function message(): string
    {
        return 'The month range must be a number between 1 and 12.';
    }
}
