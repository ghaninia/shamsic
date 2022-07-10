<?php

namespace GhaniniaIR\SolarCron\Validations\Single;

use GhaniniaIR\SolarCron\Validations\Interfaces\ValidationContract;

class SecondRange implements ValidationContract
{
    public function passes($value): bool
    {
        return $value >= 0 && $value <= 59;
    }

    public function message(): string
    {
        return 'The second range must be a number between 0 and 59.';
    }
}
