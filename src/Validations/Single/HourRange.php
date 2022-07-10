<?php

namespace GhaniniaIR\SolarCron\Validations\Single;

use GhaniniaIR\SolarCron\Validations\Single\Interfaces\ValidationContract;

class HourRange implements ValidationContract
{
    public function passes($value): bool
    {
        return $value >= 0 && $value <= 23;
    }

    public function message(): string
    {
        return 'The hour range must be a number between 0 and 23.';
    }
}
